<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected $client;
    protected $apiKey;
    protected $endpoint;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('APPGAIN_API_KEY');
        $this->endpoint = env('APPGAIN_ENDPOINT');
    }

    public function sendMessage($to, $otp)
    {
        $payload = [
            "WHATSAPP" => [
                "template_name" => "otp",
                "message" => "MESSAGE_COMES_FROM_TEMPLATE",
                "lang_code" => "en",
                "vendor" => "360dialog",
                "receivers" => [
                    [
                        "mobileNum" => $to
                    ]
                ],
                "parameters" => [
                    "body" => [
                        [
                            "type" => "text",
                            "text" => $otp
                        ]
                    ],
                    "button" => [
                        [
                            "type" => "text",
                            "text" => $otp
                        ]
                    ]
                ]
            ]
        ];
        Log::info('API Key being used: ' . $this->apiKey);

        try {
            $response = $this->client->post($this->endpoint, [
                'headers' => [
                    'appapikey'    => $this->apiKey,
                    'Content-Type' => 'application/json',
                    'Accept'       => 'application/json',
                ],
                'json' => $payload,
            ]);

            $result = json_decode($response->getBody(), true);

            // Check if the response contains error or success status
            if (isset($result['error']) || !isset($result['status']) || $result['status'] !== 'success') {
                Log::error('WhatsApp OTP Error: ' . json_encode($result));
                return false;
            }

            return true;
        } catch (RequestException $e) {
            Log::error('WhatsApp API request failed: ' . $e->getMessage());
            return false;
        }
    }

}
