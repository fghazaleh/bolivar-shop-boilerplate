<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Entity\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Entity\Product::class, function (Faker\Generator $faker) {

    $prefixImage = '/theme/universal/img/products/';
    $imagesList = ['product1.jpg','product2.jpg','product3.jpg','product4.jpg'];
    return [
        'title' => $faker->words(random_int(3,5),true),
        'description' => $faker->paragraph,
        'image' => $prefixImage.$faker->randomElement($imagesList),
        'price' => $faker->randomFloat(2,1,10),
        'stock' => random_int(0,10)
    ];
});
