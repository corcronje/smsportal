<?php

namespace CorCronje\SmsPortal\Tests;

use CorCronje\SmsPortal\Client;
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    /** @test */
    public function it_has_a_token()
    {
        $client = new Client();
        $this->assertIsString($client->token);
    }
}
