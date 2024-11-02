<?php

namespace App\Notifications;

use App\Services\SMSService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;

class QueueFailingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected string $subject;

    protected string $exception;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public JobFailed $job)
    {
        $job_name = class_basename($job->job);

        $this->subject = "Job {$job_name} Failed!";
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->line($this->job->exception)
            ->action('View in Telescope', url('/telescope'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toVonage(object $notifiable): VonageMessage
    {
        return (new VonageMessage)
            ->content($this->subject)
            ->unicode();
    }
}
