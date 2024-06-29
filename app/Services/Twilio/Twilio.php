<?php

namespace App\Services\Twilio;

use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class Twilio
{
    private ?string $authSID;

    private ?string $authToken;

    public function __construct()
    {
        $this->authSID = config('services.twilio.key');
        $this->authToken = config('services.twilio.key');
    }

    public function validate(string $phoneNumber): bool
    {
        if (empty($phoneNumber)) {
            return false;
        }

        $client = new Client($this->authSID, $this->authToken);

        try {
            $client
                ->lookups
                ->v1
                ->phoneNumbers($phoneNumber)
                ->fetch();
        } catch (TwilioException $e) {
            return false;
        }

        return true;
    }
}
