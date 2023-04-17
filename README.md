# laravel-shopee
shopee v2 SDK

#### 安装教程
````
composer require yc-hwc/laravel-shopee
````

### 用法
***

#### 配置
````
    $config = [
        'shopeeUrl'   => 'https://partner.test-stable.shopeemobile.com',
        'partnerId'   => '',
        'partnerKey'  => '',
        'accessToken' => '',
        'shopId'      => '',
        'merchantId'  => '',
    ];
    
    $shopeeSDK = \PHPShopee\ShopeeSDK::config($config);
````
#### [店铺授权](https://open.shopee.com/documents/v2/[中文版]%20OpenAPI%202.0%20Overview?module=87&type=2)
````
    $config = [
        'shopeeUrl'  => 'https://partner.test-stable.shopeemobile.com',
        'partnerId'  => 'xxxxxxx',
        'partnerKey' => 'xxxxxxxxxxxxxx',
    ];

    $shopeeSDK = \PHPShopee\ShopeeSDK::config($config);
    $fullUrl = $shopeeSDK->shopAuth()
        ->api('auth_partner')
        ->withQueryString([
            'redirect' => 'https://www.baidu.com/',
        ])
        ->fullUrl();

    return redirect($fullUrl);  
````
#### [generate first mile tracking number](https://open.shopee.com/documents/v2/v2.first_mile.generate_first_mile_tracking_number?module=96&type=1)
````
    $config = [
        'shopeeUrl'   => 'https://partner.test-stable.shopeemobile.com',
        'partnerId'   => '',
        'partnerKey'  => '',
        'accessToken' => '',
        'shopId'      => '',
    ];
    
    $params = [
        'declare_date' => '',
        'quantity' => 1,
        'seller_info' => [
            'name'    => "tom",
            'address' => "xxxxxxx",
            'region'  => "CN",
            'zipcode' => "1xxxx15",
            'phone'   => "186xxxxxx49"
        ]
    ]
    
    $shopeeSDK = \PHPShopee\ShopeeSDK::config($config);
    $response = $shopeeSDK->firstMile
    ->api('generate_firstMile_tracking_number')
    ->withBody($params)
    ->post();
    
    print_r($response);
````
#### [media_space.upload_image ](https://open.shopee.cn/documents/v2/v2.media_space.upload_image?module=91&type=1)
````
    $content = file_get_contents('path/to/file');

    $config = [
        'shopeeUrl'   => '',
        'partnerId'   => '',
        'partnerKey'  => '',
    ];

    $shopeeSDK = \PHPShopee\ShopeeSDK::config($config);
    $response = $shopeeSDK->mediaSpace()
        ->api('upload_image')
        ->attach([
            ['image', $content, md5($content)],
            ['scene', 'normal'],
        ])
        ->post();
    print_r($response);
````
