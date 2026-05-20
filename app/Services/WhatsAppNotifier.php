<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Log;

class WhatsAppNotifier
{
    protected string $adminPhone;

    public function __construct()
    {
        $this->adminPhone = config('app.admin_whatsapp', env('ADMIN_WHATSAPP', '')); // set via env
    }

    public function notifyOrderCreated(Order $order): void
    {
        $message = $this->formatOrderMessage($order, 'Pesanan Baru Dibuat');
        $this->send($order->customer_phone, $message);
        if ($this->adminPhone) {
            $this->send($this->adminPhone, $message);
        }
    }

    public function notifyOrderStatus(Order $order): void
    {
        $message = $this->formatOrderMessage($order, 'Status Pesanan Diperbarui: ' . strtoupper($order->status));
        $this->send($order->customer_phone, $message);
        if ($this->adminPhone) {
            $this->send($this->adminPhone, $message);
        }
    }

    protected function formatOrderMessage(Order $order, string $title): string
    {
        $lines = [
            $title,
            'No: ' . $order->order_number,
            'Nama: ' . $order->customer_name,
            'Total: Rp ' . number_format($order->total_amount, 0, ',', '.'),
            'Status: ' . ucfirst($order->status),
        ];
        return implode("\n", $lines);
    }

    protected function send(?string $phone, string $message): void
    {
        if (!$phone) {
            return;
        }
        // Placeholder: integrate provider API here (Fonnte/WaAPIs/etc)
        // For now, just log
        Log::info('[WA] to ' . $phone . ' => ' . $message);
    }
}
