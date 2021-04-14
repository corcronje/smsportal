<?php

namespace CorCronje\SmsPortal;

class Message {
    public $content;
    public $destination;

    public function __construct($destination, $content)
    {
        $this->destination = $destination;
        $this->content = $content;
    }
}