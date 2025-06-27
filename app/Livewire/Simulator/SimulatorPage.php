<?php

namespace App\Livewire\Simulator;

use App\Models\Booking;
use App\Models\ProductTransaction;
use Carbon\Carbon;
use Livewire\Component;

class SimulatorPage extends Component
{
    public $mode = 'machine';
    public $inputCode;
    public $message;
    public $booking;
    public $product;

    protected $listeners = ['qr-scanned' => 'setScannedCode'];

    public function setMode($mode)
    {
        $this->reset(['inputCode', 'message', 'booking', 'product']);
        $this->mode = $mode;
    }

    public function setScannedCode($code)
    {
        $this->inputCode = $code;
        $this->verifyCode();
    }

    public function verifyCode()
    {
        if ($this->mode === 'machine') {
            $this->verifyMachine();
        } else {
            $this->verifyProduct();
        }
    }

    public function verifyMachine()
    {
        $booking = Booking::where('code', $this->inputCode)->first();

        if (!$booking) {
            $this->message = 'Kode booking tidak ditemukan.';
            return;
        }

        $now = Carbon::now();
        $sessionStart = Carbon::parse($booking->date . ' ' . $booking->session_start);
        $sessionEnd = Carbon::parse($booking->date . ' ' . $booking->session_end);

        if ($now->lt($sessionStart)) { // Sekarang kurang dari jam mulai
            $this->message = 'Sesi booking belum dimulai.';
            return;
        }

        if ($now->gt($sessionEnd)) { // Sekarang lebih dari jam selesai
            $this->message = 'Sesi booking sudah berakhir.';
            return;
        }

        // Kalau waktunya valid
        $this->booking = $booking;
        $this->message = 'Mesin berhasil diaktifkan!';
    }

    public function verifyProduct()
    {
        $product = ProductTransaction::where('code', $this->inputCode)->first();

        if (!$product) {
            $this->message = 'Kode transaksi tidak ditemukan.';
            return;
        }

        if ($product->status) {
            $this->message = 'Produk sudah diambil.';
            return;
        }

        $product->update(['status' => true]);
        $this->product = $product;
        $this->message = 'Produk berhasil diambil!';
    }

    public function render()
    {
        return view('livewire.simulator.simulator-page')->layout('components.layouts.simulator');
    }
}
