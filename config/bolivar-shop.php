<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/4/17
 * Time: 7:20 PM
 */

return [
    'name' => 'Bolivar-Shop Boilerplate',
    'product' => [
        'lowStock' => 5
    ],
    'shipping' =>[
        'costs' => [
            'default' => 10.00,
            'strategy' =>
                App\Foundation\Support\Shipping\StandardShippingRate::class
                //App\Foundation\Support\Shipping\FreeMoreThanPriceShippingRate::class
        ],
    ],
    'cart' => [
        'storage'=> [
            'strategy' => App\Foundation\Support\Storage\Provider\SessionStorage::class,
            'bucketId' => 'BolivarShopBoilerplate'
        ]
    ],
    'payment' => [
        'gateway' => [
            'strategy' => App\Foundation\Support\Payment\Gateways\BraintreeGateway::class,
            'view' => 'order.partials.braintree_payment',
            'config' => [
                'environment'=>env('BRAINTREE_ENVIRONMENT','sandbox'),
                'merchantId'=>env('BRAINTREE_MERCHANTID',''),
                'publicKey'=>env('BRAINTREE_PUBLICKEY',''),
                'privateKey'=>env('BRAINTREE_PRIVATEKEY',''),
            ]
            /*,
            'strategy' => App\Foundation\Support\Payment\Gateways\StripeGateway::class,
            'config' => [
                'publicKey'=>env('STRIPE_PUBLICKEY',''),
                'privateKey'=>env('STRIPE_PRIVATEKEY',''),
            ]
            */
        ],

    ]
];