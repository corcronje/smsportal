<?php

namespace CorCronje\SmsPortal\Tests;

use CorCronje\SmsPortal\Client;
use CorCronje\SmsPortal\Message;
use PHPUnit\Framework\TestCase;

class SendMessageTest extends TestCase
{
    /** @test */
    public function it_sends_a_message()
    {
        $client = new Client();
        $message = new Message('0812345678', 'Test', ['testMode' => true]);
        $respone = $client->send($message);
        $this->assertTrue($respone->getStatusCode() === 200);
    }
}
