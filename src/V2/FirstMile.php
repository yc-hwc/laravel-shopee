<?php

namespace PHPShopee\V2;

class FirstMile extends ShopeeResource
{
    protected $parentResource = '/api/v2/first_mile';

    public function generateFirstMileTrackingNumber(): static
    {
        $this->childResources = '/generate_first_mile_tracking_number';
        return $this;
    }
}
