<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database'];   // Simpan di database
    }

    public function toArray($notifiable)
    {
        return [
            'order_id'   => $this->order->id,
            'order_number' => $this->order->order_number,
            'status'     => $this->order->status,
            'message'    => "Pesanan Anda telah " . $this->order->status,
        ];
    }
}
