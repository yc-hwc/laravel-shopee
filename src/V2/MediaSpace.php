<?php


namespace PHPShopee\V2;


use PHPShopee\V2\Traits\PartnerApi;

class MediaSpace extends ShopeeResource
{
    use PartnerApi;

    protected $parentResource = '/api/v2/media_space';
}
