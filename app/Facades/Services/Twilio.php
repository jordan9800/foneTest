<?php

namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class Twilio extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'twilio';
    }
}
