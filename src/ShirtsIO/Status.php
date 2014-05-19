<?php

namespace ShirtsIO;

use ShirtsIO\Core\Request;

class Status extends Request
{
    public function __construct($apiKey)
    {
        $this->_api_key = $apiKey;
        parent::__construct();
    }

    public function get($orderId)
    {
        return $this->send('status/' . $orderId, "GET");
    }
} 