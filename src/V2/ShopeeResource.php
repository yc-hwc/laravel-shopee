<?php

namespace PHPShopee\V2;

use PHPShopee\ShopeeSDK;

abstract class ShopeeResource
{
    protected $resourceUrl;

    protected $parentResource;

    protected $childResources;

    protected $shopeeSDK;

    protected $requestMethod = 'post';

    protected $httpHeaders = [
        'Content-type' => 'application/json',
        'Accept'       => 'application/json',
    ];

    public function __construct(ShopeeSDK $shopeeSDK)
    {
        $this->shopeeSDK = $shopeeSDK;
    }

    public function generateUrl()
    {
        $this->resourceUrl = $this->parentResource . $this->childResources;
    }
}