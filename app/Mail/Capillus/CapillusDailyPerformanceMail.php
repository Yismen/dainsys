<?php

namespace App\Mail\Capillus;

class CapillusDailyPerformanceMail extends CapillusMailBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->bcc(config('mail.from.address'))
            ->view('emails.capillus')
            ->attachFromStorage($this->temporary_mail_attachment)
            ->subject('KNYC.E Daily Performance Report');
    }
}
