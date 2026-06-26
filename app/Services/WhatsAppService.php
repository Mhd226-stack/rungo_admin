<?php

namespace App\Services;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        $this->client = new Client(
            env('TWILIO_SID'),
            env('TWILIO_TOKEN')
        );
        $this->from = env('TWILIO_WHATSAPP_FROM', 'whatsapp:+14155238886');
    }

    public function sendOTP(string $phone, string $otp): bool
    {
        try {
            $this->client->messages->create(
                'whatsapp:' . $phone,
                [
                    'from' => $this->from,
                    'body' => "Votre code de vérification Rungo est : *{$otp}*\n\nNe partagez ce code avec personne."
                ]
            );
            return true;
        } catch (\Exception $e) {
            Log::error('WhatsApp OTP error: ' . $e->getMessage());
            return false;
        }
    }
}