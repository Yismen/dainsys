<?php

namespace App\Console\Commands\RingCentralReports\Exports\Support\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BaseRingCentralMails extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected $distro;

    protected $options;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $distro, public $temporary_mail_attachment, public $subject, $options = [])
    {
        $this->distro = $distro;
        $this->options = $this->mergeDefaults($options);
    }

    public function build()
    {
        return $this
            ->from($this->options['from'], config('mail.from.name'))
            ->to($this->distro)
            ->bcc($this->options['bcc'])
            ->view($this->options['view'])
            ->attachFromStorage($this->temporary_mail_attachment)
            ->subject($this->subject);
    }

    protected function mergeDefaults(array $defaults)
    {
        return array_merge([
            'from' => config('mail.from.address'),
            'bcc' => config('mail.from.address'),
            'view' => 'emails.commands-email',
        ], $defaults);
    }
}
