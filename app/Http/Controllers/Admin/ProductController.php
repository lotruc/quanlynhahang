<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('products.*', 'categories.name as categoryName')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('status', 1)->latest()->simplePaginate(2);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'category_id' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'image.required' => 'Ảnh sản phẩm là bắt buộc',
            'image.image' => 'Ảnh sản phẩm phải có định dạng là hình ảnh',
            'image.mimes' => 'Ảnh sản phẩm phải có định dạng: jpeg,jpg,png,gif',
            'category_id.required' => 'Danh mục sản phẩm là bắt buộc',
        ]);

        $image  = $request->file('image')->store('public/products');
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->image = $image;
        $product->description = $request->input('description');

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Sản phẩm đã được tạo thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::select('products.*', 'categories.id as categoryId', 'categories.name as categoryName')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.id', $id)->first();
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'category_id' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'image.image' => 'Ảnh sản phẩm phải có định dạng là hình ảnh',
            'image.mimes' => 'Ảnh sản phẩm phải có định dạng: jpeg,jpg,png,gif',
            'category_id.required' => 'Danh mục sản phẩm là bắt buộc',
        ]);

        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) { {
                Storage::delete($product->image);
                $image = $request->file('image')->store('public/products');
                $product->image = $image;
            }
        }
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
}
