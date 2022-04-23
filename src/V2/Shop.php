<?php


namespace PHPShopee\V2;


class Shop extends ShopeeResource
{
    protected $parentResource = '/api/v2/shop';

    protected $apiType = 'auth';

    /**
     * @Author: hwj
     * @DateTime: 2022/4/23 11:28
     * @return $this
     */
    public function authorize()
    {
        $this->childResources = '/auth_partner';
        return $this;
    }
}
