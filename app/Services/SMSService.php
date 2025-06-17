<?php

namespace App\Services;

use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

class SMSService
{
    public function __construct(public string $to_number, public string $message) {}

    public function send()
    {
        $credentials = new Basic(config('vonage.api_key'), config('vonage.api_secret'));

        $client = new Client($credentials);

        return $client->sms()->send(
            new SMS($this->to_number, config('vonage.sms_from'), $this->message)
        );
    }
}
