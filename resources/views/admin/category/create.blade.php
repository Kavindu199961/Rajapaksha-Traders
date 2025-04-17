@extends('layouts.admin')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg p-4 rounded-4" style="width: 100%; max-width: 600px;">
        <h2 class="mb-4 text-center">Create New Category</h2>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Category Name</label>
                <input type="text" name="name" class="form-control form-control-lg rounded-3" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label fw-semibold">Category Image</label>
                <input type="file" name="image" id="imageInput" class="form-control form-control-lg rounded-3" accept="image/*">
            </div>

            <div class="mb-3 text-center">
                <img id="previewImage" src="#" alt="Image Preview" class="rounded-4 shadow-sm d-none" style="max-width: 200px; max-height: 200px; object-fit: cover;">
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Add Category</button>
            </div>
        </form>
    </div>
</div>

{{-- JS to handle image preview --}}
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
