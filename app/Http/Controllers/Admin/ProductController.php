<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Hiển thị form để thêm sản phẩm mới
    public function create()
    {
        $categories = Category::all(); // Lấy tất cả danh mục để chọn khi thêm sản phẩm
        return view('products.create', compact('categories'));
    }

    // Xử lý lưu sản phẩm mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048' // Tùy chọn nếu bạn muốn upload ảnh
        ]);

        // Lưu ảnh (nếu có)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Tạo sản phẩm mới
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath
        ]);

        // Chuyển hướng về danh sách sản phẩm hoặc trang nào bạn muốn
        return redirect()->route('products.create')->with('success', 'Sản phẩm đã được thêm thành công!');
    }


    public function createInCategory(Category $category)
    {
        return view('admin.products.create', compact('category'));
    }

    
    

    public function storeInCategory(Request $request, Category $category)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        // Chuẩn bị dữ liệu để lưu và gán category_id
        $data = $request->only(['name', 'description', 'price']);
        $data['category_id'] = $category->id;

        // Xử lý ảnh nếu có
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Tạo sản phẩm mới
        Product::create($data);

        // Chuyển hướng về trang danh mục với thông báo thành công
        return redirect()->route('category.show', $category->id)->with('success', 'Sản phẩm đã được thêm thành công vào danh mục!');}
    

    

    

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function showCategory($categoryId)
    {
        $category = Category::find($categoryId);
        $products = Product::where('category_id', $categoryId)->paginate(5); // Hiển thị 5 sản phẩm mỗi trang
        return view('category.show', compact('category', 'products'));
    }
    
    

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only('name');
        if ($request->hasFile('image')) {
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy(Category $category)
    {
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công!');
    }


    public function index()
{
    $products = Product::paginate(5); 
    return view('products.index', compact('products'));
}

}
