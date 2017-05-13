<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductsControllerTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;
    /**
     * @test
     * */
    public function index_method_get_all_products()
    {
        /*$user = factory(App\User::class)->create();

        $products = factory(App\Product::class,2)->create(['user_id'=>$user->id]);

        $this->get(route('api.products.index'))
            ->seeStatusCode(200);

        foreach($products as $product){
            $this->seeJson([
                'name' => $product->name,
                'price' => $product->price,
            ]);
        }*/
    }
}
