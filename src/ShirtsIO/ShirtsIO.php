<?php

namespace ShirtsIO;


class ShirtsIO
{
    static $_apiKey = "";

    public static function setAPIKey($apiKey)
    {
        ShirtsIO::$_apiKey = $apiKey;
    }

    public static function Products()
    {
        if (empty(ShirtsIO::$_apiKey)) {
            throw new \BadFunctionCallException('API Key not set');
        }

        return new Products(ShirtsIO::$_apiKey);
    }

    public static function Quote()
    {
        if (empty(ShirtsIO::$_apiKey)) {
            throw new \BadFunctionCallException('API Key not set');
        }

        return new Quote(ShirtsIO::$_apiKey);
    }

    public static function Order($isTest = false)
    {
        if (empty(ShirtsIO::$_apiKey)) {
            throw new \BadFunctionCallException('API Key not set');
        }

        return new Order(ShirtsIO::$_apiKey, $isTest);
    }

    public static function Status()
    {
        if (empty(ShirtsIO::$_apiKey)) {
            throw new \BadFunctionCallException('API Key not set');
        }

        return new Status(ShirtsIO::$_apiKey);
    }
} 