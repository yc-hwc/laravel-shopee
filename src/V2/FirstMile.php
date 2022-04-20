<?php

namespace PHPShopee\V2;

class FirstMile extends ShopeeResource
{
    protected $parentResource = '/api/v2/first_mile';

    public function generateFirstMileTrackingNumber()
    {
        $this->childResources = '/generate_first_mile_tracking_number';
    }
}