<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    // Hiển thị trang chủ với danh sách danh mục
    public function index()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    // Hiển thị sản phẩm theo danh mục
    public function showCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products()->paginate(5); // Phân trang 5 sản phẩm mỗi trang
    
        return view('category.show', compact('category', 'products'));
    }
    

}

