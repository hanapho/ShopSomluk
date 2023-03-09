<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'ขวดน้ำ';
        $category->save();

        $category = new Category();
        $category->name = 'เสื้อ';
        $category->save();

        $product = new Product();
        $product->name = 'แป๊ปซี่ 1';
        $product->price = 25;
        $product->image = '';
        $product->description = '';
        $product->category_id = 1;
        $product->save();

        $product = new Product();
        $product->name = 'แป๊ปซี่ 2';
        $product->price = 30;
        $product->image = '';
        $product->description = '';
        $product->category_id = 1;
        $product->save();

        $product = new Product();
        $product->name = 'แป๊ปซี่ 2';
        $product->price = 40;
        $product->image = '';
        $product->description = '';
        $product->category_id = 1;
        $product->save();
    }
}
