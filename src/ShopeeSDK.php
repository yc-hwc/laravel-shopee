<?php

namespace PHPShopee;

use PHPShopee\Exception\SdkException;

use PHPShopee\V2\FirstMile;

/**
 * @property-read FirstMile $firstMile
 */
class ShopeeSDK
{

    protected $defaultApiVersion = 'V2';

    protected $resources = [
        'firstMile'
    ];

    public $config = [
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

    public function __get($resourceName)
    {
        return $this->$resourceName();
    }

    public function __call($resourceName, $arguments)
    {
        if (!in_array($resourceName, $this->resources)) {
            throw new SdkException(sprintf('Invalid resource name %s. Pls check the API Reference to get the appropriate resource name.', $resourceName));
        }

        $resourceClassName = __NAMESPACE__ . "\\" . $this->defaultApiVersion . "\\" . \ucfirst($resourceName);

        $resource = new $resourceClassName($this);

        return $resource;
    }

    public static function config($config)
    {
        return new ShopeeSDK($config);
    }
}
