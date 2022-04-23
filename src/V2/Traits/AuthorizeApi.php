<?php


namespace PHPShopee\V2\Traits;

trait AuthorizeApi
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

    public function run()
    {
        $this->generateUrl();
        $resource = sprintf('%s%s?%s', $this->url, $this->uri, http_build_query(array_merge($this->commonQueryString, $this->queryString)));
        return redirect($resource);
    }
}
