<x-app-layout>
    <div class="container">
            <h1>Phân mục sản phẩm</h1>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Tên danh mục</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </form>
        </div>
    </x-app-layout>