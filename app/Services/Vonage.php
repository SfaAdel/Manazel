<?php

namespace App\Services;

use Exception;
use Vonage\Client;
use Vonage\SMS\Message\SMS;
use Illuminate\Support\Facades\Log;
use Vonage\Client\Credentials\Basic;


class Vonage
{
    public function send($customer)
    {
        $apiKey = env('VONAGE_KEY');
        $apiSecret = env('VONAGE_SECRET');
        // Log::info("API Key: $apiKey, API Secret: $apiSecret");

        $basic  = new Basic($apiKey, $apiSecret);
        $client = new Client($basic);

        try {
            $response = $client->sms()->send(
                new SMS($customer->phone, env('APP_NAME'), "Your OTP is $customer->otp")
            );
        } catch (Exception $e) {
            Log::alert($e->getMessage());
        }
    }
}
