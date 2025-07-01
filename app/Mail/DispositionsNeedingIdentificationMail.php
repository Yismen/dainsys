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

    public function __construct(public Collection $records, public int $amount_of_records) {
        // The records should be a collection of the dispositions needing identification.
        // Example: $records = collect([['agent_disposition' => '123', 'dial_group_prefix' => '456', 'records' => 10]]);
    }

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
