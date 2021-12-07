<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = 'adf';
        $product->image = 'ádfaf';
        $product->price = 1231;
        $product->status = 'adfádfasdf';
        $product->save();
    }
}
