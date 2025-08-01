<?php

namespace App\Mail\Because;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

abstract class BecauseMailBase extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $distro, public $temporary_mail_attachment, public $report_name)
    {
        foreach ($distro as $recipient) {
            $this->to($recipient);
        }
    }

    public function defaultBuild($subject, $defaults = [])
    {
        $defaults = $this->mergeDefaults($defaults);

        return $this
            ->from($defaults['from'], config('mail.from.name'))
            ->bcc($defaults['bcc'])
            ->view($defaults['view'])
            ->attachFromStorage($this->temporary_mail_attachment)
            ->subject($subject);
    }

    protected function mergeDefaults(array $defaults)
    {
        return array_merge([
            'from' => config('mail.from.address'),
            'bcc' => config('mail.from.address'),
            'view' => 'emails.capillus',
        ], $defaults);
    }
}
