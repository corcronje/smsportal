<?php

namespace CorCronje\SmsPortal;

use Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Response;

class Client
{
    public $username;
    public $password;
    public $base_uri;
    public $token;

    public function __construct()
    {
        $this->base_uri = 'https://rest.smsportal.com/';
        $this->username = 'your-username';
        $this->password = 'your-password';
        $this->token = $this->auth();
    }

    private function auth(): string
    {
        $client = new HttpClient([
            'base_uri' => $this->base_uri,
            'verify' => false
        ]);

        $response = $client->request('GET', 'authentication', [
            'auth' => [$this->username, $this->password]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new Exception("Unable to authenticate");
        }

        return json_decode($response->getBody()->getContents())->token;
    }


    public function getBalance(): float
    {
        $client = new HttpClient([
            'base_uri' => $this->base_uri,
            'verify' => false
        ]);

        $response = $client->request('GET', 'Balance', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept'        => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new Exception("Unable to retrieve the credit balance");
        }

        return json_decode($response->getBody()->getContents())->balance;
    }

    public function send(Message $message, $options = []): Response
    {
        $client = new HttpClient([
            'base_uri' => $this->base_uri,
            'verify' => false
        ]);

        $response = $client->request('POST', 'bulkmessages', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'messages' => [
                    [
                        'destination' => $message->destination,
                        'content' => $message->content
                    ],
                    'sendOptions' => $options
                ]
            ]
        ]);

        return $response;
    }
}
