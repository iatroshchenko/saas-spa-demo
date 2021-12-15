<?php


namespace App\ApiService;


use Twilio\Rest\Client;

class TwilioService
{
    private Client $client;
    private string $from;
    private string $trial;

    public function __construct(
        Client $client,
        string $from,
        string $trial
    )
    {
        $this->client = $client;
        $this->from = $from;
        $this->trial = $trial;
    }

    public function sendMessage(
        string $to,
        string $body)
    {
        return $this
            ->client
            ->messages
            ->create($to, [
                'from' => $this->from,
                'body' => $body
            ]);
    }
}
