<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommandsBaseMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

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
            ->from($this->options['from'], 'Yismen Jorge')
            ->to($this->distro)
            ->bcc($this->options['bcc'])
            ->view($this->options['view'])
            ->attachFromStorage($this->temporary_mail_attachment)
            ->subject($this->subject);
    }

    protected function mergeDefaults(array $defaults)
    {
        return array_merge([
            'from' => 'yjorge@eccocorpbpo.com',
            'bcc' => 'yjorge@eccocorpbpo.com',
            'view' => 'emails.commands-email',
        ], $defaults);
    }
}
