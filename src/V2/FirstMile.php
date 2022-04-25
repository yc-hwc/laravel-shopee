<?php

namespace PHPShopee\V2;

use PHPShopee\V2\Traits\ShopApi;

class FirstMile extends ShopeeResource
{
    use ShopApi;

    protected $parentResource = '/api/v2/first_mile';

    /**
     * @Author: hwj
     * @DateTime: 2022/4/25 12:00
     * @return $this
     */
    public function getUnbindOrderList()
    {
        $this->childResources = '/get_unbind_order_list';
        return $this;
    }

    /**
     * @Author: hwj
     * @DateTime: 2022/4/25 12:01
     * @return $this
     */
    public function getDetail()
    {
        $this->childResources = '/get_detail';
        return $this;
    }

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
