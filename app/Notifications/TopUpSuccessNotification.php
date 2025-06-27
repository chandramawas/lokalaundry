<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TopUpSuccessNotification extends Notification
{
    use Queueable;

    protected $topUp;
    protected $amount;

    /**
     * Create a new notification instance.
     */
    public function __construct($topUp, $amount)
    {
        $this->topUp = $topUp;
        $this->amount = $amount;
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
        return (new MailMessage)
            ->subject('Top Up Berhasil')
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Top up saldo kamu berhasil.')
            ->line('Detail Top Up:')
            ->line('Order ID: ' . $this->topUp->order_id)
            ->line('Jumlah: Rp' . number_format($this->amount, 0, ',', '.'))
            ->line('Waktu: ' . now()->format('d M Y, H:i'))
            ->action('Lihat Detail', route('topup.detail', $this->topUp->order_id))
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
