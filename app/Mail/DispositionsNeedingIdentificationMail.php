<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DispositionsNeedingIdentificationMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param Collection $records collection of records needing identification
     * @param int $amount_of_records  total number of records needing identification
     * @return void
     */
    public function __construct(public Collection $records, public int $amount_of_records) {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.dispositions-need-identification-mail')
            ->subject('Dispositions Needing Identification')
            ->with([
                'records' => $this->records,
                'amount_of_records' => $this->amount_of_records,
            ])
            ->to('yjorge@eccocorpbpo.com', 'Yismen Jorge');
    }
}
