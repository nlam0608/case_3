<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use phpDocumentor\Reflection\Types\Callable_;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'trà đá';
        $category->save();
    }
}
