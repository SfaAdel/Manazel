<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ShrinkItService
{


    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('SHRINKIT_BASE_URL'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.shrinkit.api_key'),
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function sendMessage($phone, $message)
    {
        try {
            $response = $this->client->post('/v1/send-message', [
                'json' => [
                    'phone' => $phone,
                    'message' => $message,
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('Failed to send WhatsApp message: ' . $e->getMessage());
            return false;
        }
    }
}

