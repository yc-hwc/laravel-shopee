# php-shopee
PHP Shopee SDK

#### 安装教程
````
composer require yc-hwc/laravel-shopee
````

#### 用法
````php
    $config = [
        'shopeeUrl' => '',
        'partnerId' => '',
        'timestamp' => '',
        'accessToken' => '',
        'shopId' => '',
        'sign' => '',
    ];
    
    $shopeeSDK = \PHPShopee\ShopeeSDK::config($config);
    $response = $shopeeSDK->firstMile
    ->generateFirstMileTrackingNumber()
    ->withBody([
        'declare_date' => '',
        'quantity' => 1,
        'seller_info' => [
            'name'    => "Tom",
            'address' => "某省某市某区某村几栋几单元几号",
            'region'  => "CN",
            'zipcode' => "123456",
            'phone'   => "1234567"
        ]
    ])
    ->post();
    
    print_r($response);
````
