<?php

namespace App\Services;

use Vonage\Client;
use Vonage\SMS\Message\SMS;
use Vonage\Client\Credentials\Basic;

class SMSService
{
    public function __construct(public string $to_number, public string $message)
    {

    }

    public function send()
    {
        $credentials = new Basic(config('vonage.api_key'), config('vonage.api_secret'));

        $client = new Client($credentials);

        return $client->sms()->send(
            new SMS($this->to_number, config('vonage.sms_from'), $this->message)
        );
    }
}
