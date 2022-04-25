<?php


namespace PHPShopee\V2\Traits;


trait AuthApi
{
    use Api;

    protected function setApiCommonParameters()
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
            'sign' => $this->generateSign($baseString, $this->shopeeSDK->config['partnerKey']),
        ];
    }
}
