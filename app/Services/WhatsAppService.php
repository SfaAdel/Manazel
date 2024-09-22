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
        $this->apiKey = env('APPGAIN_API_KEY');  // API key from environment
        $this->endpoint = env('APPGAIN_ENDPOINT'); // Endpoint from environment
    }

    public function sendMessage($to, $otp)
    {

        $to = '+966' . $to;
        Log::info('Sending OTP to: ' . $to .'  and the otp is '. $otp);
        // Constructing the payload
        $payload = [
            'WHATSAPP' => [
                'template_name' => 'otp',
                'message' => 'MESSAGE_COMES_FROM_TEMPLATE',
                'lang_code' => 'en',
                'vendor' => '360dialog',
                'receivers' => [
                    [
                        'mobileNum' =>$to, // Hardcoded value
                    ],
                ],
                'parameters' => [
                    'body' => [
                        [
                            'type' => 'text',
                            'text' =>$otp // Hardcoded OTP
                        ]
                    ],
                    'button' => [
                        [
                            'type' => 'text',
                            'text' =>$otp // Hardcoded OTP
                        ]
                    ]
                ]
            ]
        ];


        Log::info('API Key being used: ' . $this->apiKey);

        try {
            // Sending the request to the AppGain API
            $response = $this->client->post($this->endpoint, [
                'headers' => [
                    'appapikey'    => $this->apiKey,
                    'Content-Type' => 'application/json',
                    'Accept'       => 'application/json',
                ],
                'json' => $payload, // Pass the payload as JSON
            ]);

            $result = json_decode($response->getBody(), true);

            // Check if the response contains an error or is unsuccessful
            if (isset($result['error']) || !isset($result['status']) || $result['status'] !== 'success') {
                Log::error('WhatsApp OTP Error: ' . json_encode($result));
                return false;
            }

            return true;
        } catch (RequestException $e) {
            // Log the error message if the API request fails
            Log::error('WhatsApp API request failed: ' . $e->getMessage());
            return false;
        }
    }
}
