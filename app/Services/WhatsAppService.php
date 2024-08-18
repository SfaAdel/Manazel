<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class WhatsAppService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.shrinkit.ai/',
        ]);
        $this->apiKey = env('SHRINKIT_API_KEY');
    }

    public function sendMessage($to, $message)
    {
        try {
            $response = $this->client->post('v1/send-message', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'to' => $to,
                    'message' => $message,
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
