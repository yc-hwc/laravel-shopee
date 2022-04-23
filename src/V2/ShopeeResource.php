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

    public abstract function setHttpClient();
}
