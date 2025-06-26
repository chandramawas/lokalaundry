<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingSuccessNotification extends Notification
{
    use Queueable;

    protected $booking;

    /**
     * Create a new notification instance.
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Ambil semua nomor mesin
        $machineNumbers = $this->booking->bookingMachines->map(function ($machine) {
            return 'Mesin No. ' . $machine->machine->number;
        })->join(', ');

        // Ambil alamat outlet
        $outletName = $this->booking->outlet->name ?? '-';
        $outletAddress = $this->booking->outlet->address ?? '-';

        return (new MailMessage)
            ->subject('Booking Berhasil - ' . $this->booking->code)
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Booking kamu berhasil disimpan dengan detail berikut:')
            ->line('Kode Booking: ' . $this->booking->code)
            ->line('Outlet: ' . $outletName)
            ->line('Alamat: ' . $outletAddress)
            ->line('Tanggal: ' . \Carbon\Carbon::parse($this->booking->date)->format('d M Y'))
            ->line('Sesi: ' . $this->booking->session_start . ' - ' . $this->booking->session_end)
            ->line('Mesin yang Dibooking: ' . $machineNumbers)
            ->line('Total Harga: Rp' . number_format($this->booking->subtotal, 0, ',', '.'))
            ->action('Lihat Detail Booking', route('booking.detail', $this->booking->code))
            ->line('Terima kasih telah menggunakan layanan kami!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
