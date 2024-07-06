<?php

namespace App\Notifications;

use App\Services\SMSService;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;

class UserAppNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance
     *
     * @param String $subject
     * @param String $body
     */
    public function __construct(public string $subject, public string $body, public string $css_class = '')
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * The Listner \App\Listeners\AppNotificationReceived will fire event
     * \App\Events\UserAppNotificationReceived
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'vonage'];
    }

    public function toVonage(object $notifiable): VonageMessage
    {
        return (new VonageMessage)
                    ->content($this->subject)
                    ->unicode();
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject('Dainsys: ' . $this->subject)
            ->line($this->body)
            ->action('Open App', url('/admin'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'subject' => $this->subject,
            'body' => $this->body,
            'css_class' => $this->css_class,
        ];
    }
}
