<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Foundation\Support\Payment\Contracts\PaymentGatewayInterface;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PaymentGatewayInterface::class,function(){
            $paymentGateway = config('bolivar-shop.payment.gateway.strategy');
            return new $paymentGateway;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
