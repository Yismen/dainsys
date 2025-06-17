<?php

namespace App\Mail\Political;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

abstract class PoliticalMailBase extends Mailable
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
            ->from($defaults['from'], 'Yismen Jorge')
            ->bcc($defaults['bcc'])
            ->view($defaults['view'])
            ->attachFromStorage($this->temporary_mail_attachment)
            ->subject($subject);
    }

    protected function mergeDefaults(array $defaults)
    {
        return array_merge([
            'from' => 'yjorge@eccocorpbpo.com',
            'bcc' => 'yjorge@eccocorpbpo.com',
            'view' => 'emails.political',
        ], $defaults);
    }
}
