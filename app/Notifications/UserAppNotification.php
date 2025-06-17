<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserAppNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance
     */
    public function __construct(public string $subject, public string $body, public string $css_class = '') {}

    /**
     * Get the notification's delivery channels.
     *
     * The Listner \App\Listeners\AppNotificationReceived will fire event
     * \App\Events\UserAppNotificationReceived
     *
     * @return array
     */
    public function via(mixed $notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(mixed $notifiable)
    {
        return (new MailMessage)
            ->subject('Dainsys: '.$this->subject)
            ->line($this->body)
            ->action('Open App', url('/admin'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray(mixed $notifiable)
    {
        return [
            'subject' => $this->subject,
            'body' => $this->body,
            'css_class' => $this->css_class,
        ];
    }
}
