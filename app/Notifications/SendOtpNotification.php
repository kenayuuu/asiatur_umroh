<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpNotification extends Notification
{
    use Queueable;

    private string $otpCode;

    public function __construct(string $otpCode)
    {
        $this->otpCode = $otpCode;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('nikena608@gmail.com', 'ASIATUR')
            ->subject('Kode OTP Untuk Aktivasi Akun Anda')
            ->greeting('Halo ' . $notifiable->name . ',')
            ->line('Anda menerima kode OTP untuk mengaktifkan akun Anda di sistem ASIATUR.')
            ->line('Gunakan kode berikut untuk mengaktifkan akun Anda:')
            ->line('')
            ->line('Kode OTP: ' . $this->otpCode)
            ->line('Kode ini berlaku selama 15 menit.')
            ->line('Klik tombol di bawah ini lalu masukkan kode OTP untuk login otomatis tanpa memasukkan email dan password.')
            ->action('Verifikasi OTP', url(route('otp.form', ['email' => $notifiable->email], false)))
            ->line('Jika Anda tidak meminta kode ini, abaikan email ini.')
            ->salutation('Salam,
Tim ASIATUR');
    }
}
