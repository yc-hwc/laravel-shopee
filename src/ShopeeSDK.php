<?php

namespace PHPShopee;

use PHPShopee\Exception\SdkException;

class ShopeeSDK
{

    protected $defaultApiVersion = 'V2';

    protected $resources = [
        'firstMile'
    ];

    protected $config = [
        'shopeeUrl' => '',
        'apiVersion' => '',
        'partnerId' => '',
        'timestamp' => '',
        'accessToken' => '',
        'shopId' => '',
        'sign' => '',
    ];

    public function __construct($config)
    {
        $this->config = array_merge($this->config,[
            'apiVersion' => $this->defaultApiVersion, // 默认api版本为v2
        ], $config);

        $this->defaultApiVersion = $this->config['apiVersion']?: $this->defaultApiVersion;
    }

    public function __call($resourceName, $arguments)
    {
        if (!in_array($resourceName, $this->resources)) {
            throw new SdkException(sprintf('Invalid resource name %s. Pls check the API Reference to get the appropriate resource name.', $resourceName));
        }

        $resourceClassName = __NAMESPACE__ . "\\" . $this->defaultApiVersion . "\\$resourceName";

        $childResourceKey = !empty($arguments) ? $arguments[0] : null;

        $resource = new $resourceClassName($childResourceKey, $this);

        return $resource;
    }

    public static function config($config)
    {
        return new ShopeeSDK($config);
    }
}