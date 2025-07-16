<?php

namespace App\Mail\Because;

class BecauseDailyPerformanceMail extends BecauseMailBase
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
            ->subject('Kipany - Because Daily Performance Report');
    }
}
