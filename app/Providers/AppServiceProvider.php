<?php

namespace App\Providers;

use App\Foundation\Support\Storage\Provider\SessionStorage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindSupports();
        $this->bindServices();

    }
    /**
     * Used to bind support classes with their interfaces;
     * */
    protected function bindSupports(){

        $this->app->singleton(\App\Foundation\Support\Storage\Contracts\StorageInterface::class,function(){
            $bucketId = config('bolivar-shop.cart.storage.bucketId');
            $storage = config('bolivar-shop.cart.storage.strategy');
            return new $storage($bucketId);
        });

        $this->app->bind(\App\Foundation\Support\Shipping\Contracts\ShippingRateInterface::class,function(){
            $shippingRate = config('bolivar-shop.shipping.costs.strategy');
            return new $shippingRate();
        });
    }
    /**
     * Used to bind services classes with their interfaces;
     * */
    protected function bindServices(){

        $this->app->bind(\App\Foundation\Services\Contracts\OrderServiceInterface::class,
            \App\Foundation\Services\OrderService::class);

        $this->app->bind(\App\Foundation\Services\Contracts\UserServiceInterface::class,
            \App\Foundation\Services\UserService::class);

        $this->app->bind(\App\Foundation\Services\Contracts\ProductServiceInterface::class,
            \App\Foundation\Services\ProductService::class);

        $this->app->bind(\App\Foundation\Services\Contracts\OrderServiceInterface::class,
            \App\Foundation\Services\OrderService::class);

        $this->app->bind(\App\Foundation\Services\Contracts\CartServiceInterface::class,
            \App\Foundation\Services\CartService::class);

        $this->app->bind(\App\Foundation\Services\Contracts\AddressServiceInterface::class,
            \App\Foundation\Services\AddressService::class);

        $this->app->bind(\App\Foundation\Services\Contracts\PaymentServiceInterface::class,
            \App\Foundation\Services\PaymentService::class);

        $this->app->bind(\App\Foundation\Services\Contracts\ShippingServiceInterface::class,
            \App\Foundation\Services\ShippingService::class);
    }


}
