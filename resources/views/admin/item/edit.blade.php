@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Item' : 'Add New Item')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow rounded-4">
        <div class="card-header bg-gradient {{ isset($item) ? 'bg-warning' : 'bg-success' }} text-white rounded-top-4">
            <h4 class="mb-0">{{ isset($item) ? 'Edit Item' : 'Add New Item' }}</h4>
        </div>

        <div class="card-body">
            <form action="{{ isset($item) ? route('items.update', $item) : route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($item)) @method('PUT') @endif

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter item name"
                            value="{{ old('name', $item->name ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Category</label>
                        <select name="category_id" class="form-select" required>
                            <option value="" disabled {{ old('category_id', $item->category_id ?? '') ? '' : 'selected' }}>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $item->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Item description..." required>{{ old('description', $item->description ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Regular Price (LKR)</label>
                        <input type="number" step="0.01" name="regular_price" class="form-control" placeholder="0.00"
                            value="{{ old('regular_price', $item->regular_price ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Real Price (LKR)</label>
                        <input type="number" step="0.01" name="real_price" class="form-control" placeholder="0.00"
                            value="{{ old('real_price', $item->real_price ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Upload Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                    </div>

                    <div class="col-md-6 d-flex align-items-end">
                        <div>
                            <img id="imagePreview" 
                                 src="{{ isset($item) && $item->image ? asset('storage/' . $item->image) : '#' }}" 
                                 alt="Image Preview" 
                                 class="img-thumbnail {{ isset($item) && $item->image ? '' : 'd-none' }}" 
                                 style="max-height: 150px;">
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn {{ isset($item) ? 'btn-warning text-white' : 'btn-success' }} px-4">
                        <i class="fas {{ isset($item) ? 'fa-edit' : 'fa-save' }} me-2"></i>
                        {{ isset($item) ? 'Update Item' : 'Save Item' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const file = event.target.files[0];

        if (file) {
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.classList.remove('d-none');
        }
    }
</script>
@endsection
