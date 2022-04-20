<?php

namespace PHPShopee\V2;

use PHPShopee\ShopeeSDK;
use PHPShopee\V2\Traits\Api;

abstract class ShopeeResource
{
    use Api;

    protected $resourceUrl;

    protected $parentResource;

    protected $childResources;

    protected $shopeeSDK;

    public function __construct(ShopeeSDK $shopeeSDK)
    {
        $this->shopeeSDK = $shopeeSDK;
        $this->resourceUrl = &$shopeeSDK->config['shopeeUrl'];
        $this->setHttpClient();
    }
}
