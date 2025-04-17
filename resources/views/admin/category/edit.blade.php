@extends('layouts.admin')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg p-4 rounded-4" style="width: 100%; max-width: 600px;">
        <h2 class="mb-4 text-center">Edit Category</h2>

        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Category Name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control form-control-lg rounded-3" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Category Image</label>
                <input type="file" name="image" id="imageInput" class="form-control form-control-lg rounded-3" accept="image/*">
            </div>

            <div class="mb-3 text-center">
                <img 
                    id="previewImage" 
                    src="{{ $category->image ? asset('storage/' . $category->image) : '#' }}" 
                    alt="Image Preview" 
                    class="rounded-4 shadow-sm {{ $category->image ? '' : 'd-none' }}" 
                    style="max-width: 200px; max-height: 200px; object-fit: cover;"
                >
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-success btn-lg rounded-pill">Update Category</button>
            </div>
        </form>
    </div>
</div>

{{-- JS for image preview --}}
<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const [file] = this.files;
        const preview = document.getElementById('previewImage');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        } else {
            preview.classList.add('d-none');
            preview.src = "#";
        }
    });
</script>
@endsection
