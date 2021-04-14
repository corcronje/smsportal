# SMSPortal CLient
A PHP client for sending SMS messages via SMSPortal

## About
[SMSPortal](https://smsportal.com) is a popular business communications provider offering a bulk SMS messaging service through their intuitive web interface and API. This package is a PHP client for sending SMS messages from your PHP project via this useful service.

## Getting Started
To send bulk SMS, you need a SMSPortal account and SMS credits. You can register and purchase credits from [https://smsportal.com/](https://smsportal.com/). Once registered, you can follow the instructions a generate an API client ID and secret.

## Dependencies
1.	PHP 7.2 +
2.	[GuzzleHttp Client]( https://docs.guzzlephp.org)

## Installation
1.	You can install this package via composer using:
``` sh
composer require corcronje/smsportal
```
2.	Basic usage:
``` php
$client = new Client('your-api-id', 'your-api-secret');

$client->getBalance(); // return the remaining credits

$client->send('0812345678', 'Your message'); // send a SMS message
```

## Contributors
•	[Cor Cronje]( https://twitter.com/corcronje)
