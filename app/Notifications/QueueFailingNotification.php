<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\Events\JobFailed;

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
     * @return array
     */
    public function via(mixed $notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(mixed $notifiable)
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
     * @return array
     */
    public function toArray(mixed $notifiable)
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
