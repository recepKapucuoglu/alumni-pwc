<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageReminderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->view('email.daily.message_reminder', ['user' => $notifiable])
            ->subject('Okunmamış mesajlarınız var');
    }

    /**
     * Get the database representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toDatabase($notifiable): array
    {
        return [
            'message' => sprintf(
                'Sayın, %s, okunmamış mesajlarınız var. Lütfen kontrol ediniz.',
                $notifiable->name,
            ),
            'link' => route('chat.index'),
        ];
    }
}
