<x-app-layout>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Thêm bài viết</h1>
                <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                            required>
                        @error('title')
                            <div class="invalid-feedback"></div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">noi dung </label>
                        <textarea class="ckeditor form-control @error('description') is-invalid @enderror" name="content"
                            placeholder="Description for category" id="content" style="height: 150px;"></textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image"
                            class="form-control-file @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Create</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
