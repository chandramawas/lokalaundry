<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductTransactionSuccessNotification extends Notification
{
    use Queueable;

    protected $transaction;

    /**
     * Create a new notification instance.
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
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
        $productList = $this->transaction->items->map(function ($item) {
            return $item->product->name . ' (Qty: ' . $item->quantity . ')';
        })->join(', ');

        return (new MailMessage)
            ->subject('Transaksi Produk Berhasil - ' . $this->transaction->code)
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Pembayaran produk kamu berhasil.')
            ->line('Kode Transaksi: ' . $this->transaction->code)
            ->line('Produk yang Dibeli: ' . $productList)
            ->line('Total Harga: Rp' . number_format($this->transaction->subtotal, 0, ',', '.'))
            ->action('Lihat Detail Transaksi', route('product.detail', $this->transaction->code))
            ->line('Terima kasih telah berbelanja di platform kami!');
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
