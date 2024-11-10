<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Điện thoại',
            'image' => 'categories/dienthoai.jpg' 
        ]);

        Category::create([
            'name' => 'Máy tính bảng',
            'image' => 'categories/maytinhbang.jpg'
        ]);

        Category::create([
            'name' => 'Laptop',
            'image' => 'categories/laptop.jpg'
        ]);
    }
}
