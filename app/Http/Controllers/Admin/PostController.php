<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::latest()->get();
        return view('admin.post.index', compact('post'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        // Xử lý lưu bài viết mới vào cơ sở dữ liệu
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'content' => 'required',
            'image' => 'required|image',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }
        Post::create([
            'title' => $request->title,
            'status' => $request->status,
            'content' => $request->content,
            'image' => $imageName,

        ]);

        return redirect()->route('admin.post.index')->with('success', 'Bài viết đã được tạo thành công.');
    }
    public function edit(string $id)
    {
        // Hiện thị form  chỉnh sửa bài viết
        $post = Post::all();
        return view('admin.post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Xử lý cập nhật thông tin bài viết vào cơ sở dữ liệu
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);
        $imageName = $post->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image'), $imageName);
        }
        $post->update([
            'title' => $request->title,
            'status' => $request->status,
            'content' => $request->content,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.post.index')->with('success', 'Bài viết đã cập nhật thành công.');
    }
    public function destroy(Post $post)
    {
        // Xóa bài viết khỏi cơ sở dữ liệu

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Bài viết đã được xóa thành công.');
    }
}
