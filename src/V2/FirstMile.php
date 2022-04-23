<?php

namespace PHPShopee\V2;

class FirstMile extends ShopeeResource
{
    protected $parentResource = '/api/v2/first_mile';

    protected $apiType = 'shop'; // api类型 shop|merchant|public

    /**
     * @Author: hwj
     * @DateTime: 2022/4/23 11:28
     * @return $this
     */
    public function generateFirstMileTrackingNumber()
    {
        $this->childResources = '/generate_first_mile_tracking_number';
        return $this;
    }
}
