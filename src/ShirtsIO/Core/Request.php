<?php

namespace ShirtsIO\Core;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Guzzle\Common\Exception\GuzzleException;
use Guzzle\Http\Client;
use Guzzle\Http\Exception\BadResponseException;

class Request
{
    private $_api_url = 'https://www.shirts.io/api';
    protected $_api_key = '';
    private $_api_version = 'v1';
    protected $_guzzle_plugins = array();
    private $_client;

    protected function __construct()
    {
        $this->_client = new Client();

        if (count($this->_guzzle_plugins) > 0) {
            foreach ($this->_guzzle_plugins as $plugin) {
                if ($plugin instanceof EventSubscriberInterface) {
                    $this->_client->addSubscriber($plugin);
                }
            }
        }
    }

    protected function send($url, $request_type, $data = array())
    {

        $data['api_key'] = $this->_api_key;


        switch (strtoupper($request_type)) {
            case "GET":
                $request = $this->_client->get($this->_api_url . '/' . $this->_api_version . '/' . $url, null, array('query' => $data));
                break;
            case "POST":
                $request = $this->_client->post($this->_api_url . '/' . $this->_api_version . '/' . $url, null, $data);
                break;
        }

        try {
            $response = $request->send()->json();
        } catch (BadResponseException $exception) {
            $statusCode = $exception->getResponse()->getStatusCode();

            switch ($statusCode) {
                case "400":
                    throw new \HttpRequestException("Parameters invalid");
                case "401":
                    throw new \HttpRequestException("API key was invalid or deactivated");
                case "402":
                    throw new \HttpRequestException("Request failed on server end.");
                default:
                    throw new \Exception('Invalid Request Exception');

            }
        } catch (GuzzleException $exception) {
            $statusCode = $exception->getResponse()->getStatusCode();

            switch ($statusCode) {
                case "400":
                    throw new \HttpRequestException("Parameters invalid");
                case "401":
                    throw new \HttpRequestException("API key was invalid or deactivated");
                case "402":
                    throw new \HttpRequestException("Request failed on server end.");
                default:
                    throw new \Exception('Invalid Request Exception');
            }
        }

        return $response;
    }
}