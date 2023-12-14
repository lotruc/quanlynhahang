<x-app-layout>
    <h1>Danh sách bài viết</h1>

    <a href="{{ route('admin.post.create') }}" class="btn btn-primary mb-3">Tạo bài viết mới</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Tóm tắt</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Hành động</th>
                <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($post as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->abstract }}</td>
                    <td><img src="{{ asset('images/' . $post->image) }}" alt="Image"
                            style="width:300px;height:200px;border-radius:10px;object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Xem</a><br /><br />
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-secondary">Chỉnh
                            sửa</a><br /><br />
                        <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST"
                            style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">Xóa</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.post.confirmed', $post->id) }}" method="POST"
                            style="display: inline-block">
                            @csrf
                            @method('PATCH')
                            @if ($post->status == 'pending')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn đăng bài viết này?')">Phê
                                    duyêt</button>
                            @else
                                <h4>Bài viết này đã được đăng</h4>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
