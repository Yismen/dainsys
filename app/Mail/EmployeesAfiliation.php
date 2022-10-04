<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeesAfiliation extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $file_name;
    public $subject;
    public $recipients;

    public function __construct(string $file_name, string $subject, array $recipients)
    {
        $this->file_name = $file_name;
        $this->subject = $subject;
        $this->recipients = $recipients;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.employees', ['title' => $this->subject])
            ->to($this->recipients)
            ->attachFromStorage($this->file_name)
            ->subject($this->subject);
    }

    // protected function getMailTitle()
    // {
    //     return join(' ', [
    //         str($this->file_prefix)->headline(),
    //         $this->date_from->format('Y-m-d'),
    //         'To',
    //         $this->date_to->format('Y-m-d')
    //     ]);
    // }

    // protected function getBuild()
    // {
    //     $file_name = $this->getFileName();

    //     $exporter = (new $this->exporter($this->date_from, $this->date_to));

    //     if (!$exporter->hasData()) {
    //         return false;
    //     }

    //     $exporter->store($file_name);

    //     $title = $this->getMailTitle();

    //     $recipients = $this->getRecipients();

    //     return $this->markdown('emails.employees', ['title' => $title])
    //         ->to($recipients)
    //         ->attachFromStorage($file_name)
    //         ->subject($title);
    // }
}
