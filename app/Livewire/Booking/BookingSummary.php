<?php

namespace App\Livewire\Booking;

use App\Models\Booking;
use App\Models\Machine;
use App\Models\Outlet;
use App\Models\Wallet;
use Carbon\Carbon;
use DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class BookingSummary extends Component
{
    use LivewireAlert;

    public $outletId;
    public $outlet;

    public $selectedDate;
    public $selectedDateFormatted;
    public $selectedSession;
    public $selectedMachines = [];

    public $subtotal = 0;

    protected $listeners = [
        'dateSelected' => 'updateDate',
        'sessionSelected' => 'updateSession',
        'machinesSelected' => 'updateMachines',
        'confirmedPayment' => 'processPayment',
    ];

    public function mount($outletId)
    {
        $this->outlet = Outlet::findOrFail($outletId);
        $this->updateDate($this->selectedDate);
    }

    public function updateDate($date)
    {
        // Simpen data mentah (ini yang dipake buat database)
        $this->selectedDate = $date;

        // Simpen data untuk tampilan
        $this->selectedDateFormatted = Carbon::parse($date)->translatedFormat('l, d F Y');
    }

    public function updateSession($session)
    {
        $this->selectedSession = $session;
    }

    public function updateMachines($machines)
    {
        $this->selectedMachines = Machine::with('machineType')->whereIn('id', $machines)->get();
        $this->calculateSubtotal();
    }

    public function calculateSubtotal()
    {
        $total = 0;

        foreach ($this->selectedMachines as $machine) {
            $total += $machine->machineType->price;
        }

        $this->subtotal = $total;
    }

    public function confirmPayment()
    {
        $this->confirm('Apakah kamu yakin ingin melanjutkan pembayaran?', [
            'confirmButtonText' => 'Ya, Bayar',
            'onConfirmed' => 'confirmedPayment',
        ]);
    }

    public function processPayment()
    {
        DB::beginTransaction();

        try {
            $wallet = Wallet::where('user_id', auth()->id())->first();

            if (!$wallet) {
                $this->alert('error', 'Wallet tidak ditemukan.');

                return;
            }

            // Cek saldo
            if ($wallet->balance < $this->subtotal) {
                $this->alert('error', 'Saldo tidak cukup untuk melakukan pembayaran.');

                return;
            }

            $sessionParts = explode(' - ', $this->selectedSession);
            $sessionStart = $sessionParts[0];
            $sessionEnd = $sessionParts[1];

            // Kurangi Saldo
            $wallet->balance -= $this->subtotal;
            $wallet->save();

            $booking = Booking::create([
                'user_id' => auth()->id(),
                'outlet_id' => $this->outlet->id,
                'date' => Carbon::parse($this->selectedDate)->format('Y-m-d'),
                'session_start' => $sessionStart,
                'session_end' => $sessionEnd,
                'subtotal' => $this->subtotal,
            ]);

            $booking->code = 'Booking-' . $this->outlet->id . '-' . uniqid();
            $booking->save();

            foreach ($this->selectedMachines as $machine) {
                $booking->bookingMachines()->create([
                    'machine_id' => $machine->id,
                    'price' => $machine->machineType->price,
                ]);
            }

            DB::commit();

            $this->flash(
                'success',
                'Pembayaran berhasil dan booking telah tersimpan!',
                [],
                route('booking.detail', $booking->code)
            );
        } catch (\Exception $e) {
            DB::rollBack();

            $this->alert('error', 'Terjadi kesalahan saat memproses pembayaran!');
        }
    }

    public function render()
    {
        return view('livewire.booking.booking-summary');
    }
}
