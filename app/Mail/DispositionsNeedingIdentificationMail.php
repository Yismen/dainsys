<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DispositionsNeedingIdentificationMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public int  $records;

    public function __construct(int $records)
    {
        $this->records = $records;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.dispositions-need-identification-mail')
            ->to('yjorge@eccocorpbpo.com', 'Yismen Jorge');
    }
}
