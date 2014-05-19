<?php

namespace ShirtsIO;


use ShirtsIO\Core\Request;

class Order extends Request
{
    private $_isTest = false;

    public function __construct($apiKey, $isTest = false)
    {
        $this->_api_key = $apiKey;
        $this->_isTest  = $isTest;
        parent::__construct();
    }

    public function create($params)
    {
        if (empty($params['test'])) {
            $params['test'] = $this->_isTest;
        }

        return $this->send('order/', "POST", $params);
    }
} 