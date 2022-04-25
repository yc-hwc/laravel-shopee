<?php


namespace PHPShopee\V2;

use PHPShopee\V2\Traits\PartnerApi;

class Shop extends ShopeeResource
{
    use PartnerApi;

    protected $parentResource = '/api/v2/shop';

    /**
     * @Author: hwj
     * @DateTime: 2022/4/23 11:28
     * @return $this
     */
    public function authPartner()
    {
        $this->childResources = '/auth_partner';
        return $this;
    }
}
