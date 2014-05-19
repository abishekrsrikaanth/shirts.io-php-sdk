<?php

namespace ShirtsIO;

use ShirtsIO\Core\Request;

class Products extends Request
{
    public function __construct($apiKey)
    {
        $this->_api_key = $apiKey;
        parent::__construct();
    }

    public function getCategories()
    {
        return $this->send('products/category', "GET");
    }

    public function getProducts($categoryId)
    {
        return $this->send('products/category/' . $categoryId, "GET");
    }

    public function getProductInfo($productId)
    {
        return $this->send('products/' . $productId, "GET");
    }
} 