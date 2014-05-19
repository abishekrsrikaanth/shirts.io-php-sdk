<?php

namespace ShirtsIO;


use ShirtsIO\Core\Request;

class Quote extends Request
{
    public function __construct($apiKey)
    {
        $this->_api_key = $apiKey;
        parent::__construct();
    }

    public function get($params)
    {
        if (empty($params)) {
            throw new \InvalidArgumentException("The Parameter cannot be empty");
        }

        return $this->send('quote/', "GET", $params);
    }
} 