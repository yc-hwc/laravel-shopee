<?php


namespace PHPShopee\V2;


use PHPShopee\V2\Traits\AuthApi;

class Auth extends ShopeeResource
{
    use AuthApi;

    protected $parentResource = '/api/v2/auth';

    /**
     * @Author: hwj
     * @DateTime: 2022/4/23 11:28
     * @return $this
     */
    public function tokenGet()
    {
        $this->childResources = '/token/get';
        return $this;
    }
}
