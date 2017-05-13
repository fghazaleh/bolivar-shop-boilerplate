<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Entity\Product::truncate();
        factory(App\Entity\Product::class, 50)->create();
    }
}
