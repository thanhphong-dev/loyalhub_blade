<?php

namespace App\Notifications;

use App\Mail\EmployeeCreateMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateEmployeeNotification extends Notification
{
    use Queueable;

    private string $planinPassword;

    public array $mailData;
    public function __construct($planinPassword)
    {
        $this->planinPassword = $planinPassword;
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
    public function toMail(object $notifiable): EmployeeCreateMail
    {
        $this->mailData = [
            'from' => config('mail.from.address'),
            'form_name' => config('mail.from.name'),
            'to' => $notifiable->email ?? null,
            'subject' => __('mail.create.user.subject'),
        ];

        $data = [
            'full_name' => $notifiable->frist_name. ''. $notifiable->last_name,
            'email' => $notifiable->email,
            'plain_password' => $this->planinPassword,
            'url' => config('app.url'),
            'app_name' => config('app.name'),
        ];

        return (new EmployeeCreateMail($data))->to($notifiable->email);
    }

}
