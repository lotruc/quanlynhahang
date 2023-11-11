<x-app-layout>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Danh sách sản phẩm</h1>
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">Thêm mới sản phẩm</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src="{{ Storage::url($product->image) }}"
                                style="width:200px;height:200px;object-fit:cover;border-radius:10px" alt="">
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->categoryName }}</td>
                        <td>
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary btn-sm">Chỉnh
                                sửa</a>
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if (count($products) == 0)
                    <td class="align-center text-danger">
                        Không có sản phẩm nào để hiển thị!
                    </td>
                @endif
            </tbody>
        </table>
        <div class="text-end mt-5">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
