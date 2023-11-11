<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Hiển thị danh sách các danh mục
     */
    public function index()
    {
        $categories = Category::latest()->simplePaginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * hiển thị fỏrm thêm danh mục.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Lưu danh mục mới.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Tên danh mục là bắt buộc.',
        ]);

        $category = new Category();
        $category->name = $request->input('name');

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được tạo thành công!');
    }


    /**
     * Hiển thị form sửa danh mục.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * cập nhật danh mục.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Tên danh mục là bắt buộc.',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật thành công!');
    }

    /**
     * Xóa danh mục.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được xóa thành công!');
    }
}
