<?php

namespace App\Mail\Transports;

use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\MessageConverter;
use Illuminate\Support\Facades\Http;

class MailtrapApiTransport extends AbstractTransport
{
    protected $token;

    public function __construct(string $token)
    {
        parent::__construct();
        $this->token = $token;
    }

    protected function doSend(SentMessage $message): void
    {
        $email = MessageConverter::toEmail($message->getOriginalMessage());
        
        $payload = [
            'from' => [
                'email' => $email->getFrom()[0]->getAddress(),
                'name' => $email->getFrom()[0]->getName() ?: 'UNS Alumni',
            ],
            'to' => array_map(fn($address) => [
                'email' => $address->getAddress(),
                'name' => $address->getName() ?: '',
            ], $email->getTo()),
            'subject' => $email->getSubject(),
            'text' => $email->getTextBody(),
            'html' => $email->getHtmlBody(),
        ];

        // For Mailtrap Sandbox API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post('https://sandbox.api.mailtrap.io/api/send/' . env('MAILTRAP_INBOX_ID', ''), $payload);

        if (!$response->successful()) {
            throw new \Exception('Mailtrap API Error: ' . $response->body());
        }
    }

    public function __toString(): string
    {
        return 'mailtrap';
    }
}
