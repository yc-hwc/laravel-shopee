<?php


namespace PHPShopee\V2;


use PHPShopee\V2\Traits\PartnerApi;

class MediaSpace extends ShopeeResource
{
    use PartnerApi;

    protected $parentResource = '/api/v2/media_space';

    protected function setApiCommonParameters()
    {
        return match ($this->childResources) {
            'init_video_upload',
            '/api/v2/media_space/init_video_upload',
            'get_video_upload_result',
            '/api/v2/media_space/get_video_upload_result' => $this->shopApiCommonParameters(),
            default => $this->partnerApiCommonParameters(),
        };
    }

    protected function shopApiCommonParameters()
    {
        $shopeeSDK = &$this->shopeeSDK;
        $baseString = sprintf('%s%s%s%s%s', ...[
                $shopeeSDK->config['partnerId'],
                $this->uri,
                $this->timestamp,
                $shopeeSDK->config['accessToken'],
                $shopeeSDK->config['shopId']
            ]
        );

        $this->commonQueryString = [
            'partner_id'   => $shopeeSDK->config['partnerId'],
            'timestamp'    => $this->timestamp,
            'access_token' => $shopeeSDK->config['accessToken'],
            'shop_id'      => $shopeeSDK->config['shopId'],
            'sign'         => $this->generateSign($baseString, $shopeeSDK->config['partnerKey']),
        ];
    }

    protected function partnerApiCommonParameters()
    {
        $baseString = sprintf('%s%s%s', ...[
                $this->shopeeSDK->config['partnerId'],
                $this->uri,
                $this->timestamp,
            ]
        );

        $this->commonQueryString = [
            'partner_id' => $this->shopeeSDK->config['partnerId'],
            'timestamp'  => $this->timestamp,
            'sign'       => $this->generateSign($baseString, $this->shopeeSDK->config['partnerKey']),
        ];
    }
}
