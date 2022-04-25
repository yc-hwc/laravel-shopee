<?php

namespace PHPShopee\V2;

use PHPShopee\ShopeeSDK;
use PHPShopee\V2\Traits\Api;

abstract class ShopeeResource
{
    protected $parentResource;

    protected $childResources;

    protected $shopeeSDK;

    public function __construct(ShopeeSDK $shopeeSDK)
    {
        $this->shopeeSDK = $shopeeSDK;
        $this->setHttpClient();
    }

    /**
     * @Author: hwj
     * @DateTime: 2022/4/25 12:14
     * @param $resourceName
     * @return static
     */
    public function __get($resourceName)
    {
        return $this->$resourceName();
    }

    /**
     * @Author: hwj
     * @DateTime: 2022/4/25 12:02
     * @param $resourceName
     * @param $arguments
     * @return staitc
     */
    public function __call($resourceName, $arguments)
    {
        $this->childResources = sprintf('/%s', $resourceName);
        return $this;
    }

    public abstract function setHttpClient();
}
