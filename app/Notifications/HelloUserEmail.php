<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HelloUserEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())
                    ->subject('Registration at the International Map')
                    ->greeting('Hello International student '.$notifiable->name)
                    ->line('Thank you for joining my great website.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
