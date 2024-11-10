<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $dienthoai = Category::where('name', 'Điện thoại')->first();
        $tablet = Category::where('name', 'Máy tính bảng')->first();
        $laptop = Category::where('name', 'Laptop')->first();

        Product::create([
            'category_id' => $dienthoai->id,
            'name' => 'iPhone 14',
            'description' => 'Apple iPhone 14 với màn hình Super Retina XDR.',
            'price' => 999.99,
            'image' => 'products/dienthoai.jpg' // Tải lên storage/app/public/products/iphone14.jpg
        ]);

        Product::create([
            'category_id' => $tablet->id,
            'name' => 'iPad Pro',
            'description' => 'Apple iPad Pro với chip M1 mạnh mẽ.',
            'price' => 799.99,
            'image' => 'products/maytinhbang.jpg'
        ]);

        Product::create([
            'category_id' => $laptop->id,
            'name' => 'MacBook Air',
            'description' => 'Apple MacBook Air với chip M2 tiết kiệm năng lượng.',
            'price' => 1199.99,
            'image' => 'products/laptop.jpg'
        ]);
    }
}
