<?php

namespace Database\Seeders;

use Database\Factories\CategoryFactory;
use Database\Factories\ProductFactory;
use FactoryMethod;
use Illuminate\Contracts\Cookie\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //modelo factory
/*      Category::factory()->count(50)->create();
        Product::factory()->count(50)->create();
        ProductImage::factory()->count(100)->create(); */

/*         Category::factory()->count(10)->create()->each(function($category){
            Product::factory()->count(50)->make();
            $category->product()->save(Product::factory());
        }); */

        $categories = Category::factory()->count(5)->create();
        $categories->each(function($categories){
            $products = Product::factory()->count(20)->make();
            $categories->product()->saveMany($products);

            $products->each(function ($product){
                $img = ProductImage::factory()->count(5)->make();
                $product->image()->saveMany($img);
            });
        });
    }
}
