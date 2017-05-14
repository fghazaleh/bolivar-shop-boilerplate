## About Bolivar Shop Boilerplate

Laravel 5.3.* + Boostrap 3.2.* + jQuery 2.* + universal boostrap theme

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## git clone
```
$ git clone https://github.com/fghazaleh/bolivar-shop-boilerplate.git
```


## Installation
```
$ composer install
```

Open ```.env``` and enter necessary config for DB.

```
$ php artisan migrate
$ php artisan db:seed
```

## Feature
* Products.
* Product Details.
* Shopping Cart.
* Payment Gateways:

1. Braintree gateway.
2. Stripe (COMING SOON).

* Shipping Rate.
* Address.
* Customer.


## Security Vulnerabilities

f you discover a security vulnerability within this boilerplate,
please send an e-mail to F. Ghazaleh at franco.ghazaleh@gmail.com,
or create a pull request if possible. All security vulnerabilities will be promptly addressed.
Please reference this page to make sure you are up to date.

## License

This project is licensed under the MIT License.
