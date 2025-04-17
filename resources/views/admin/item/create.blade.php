@extends('layouts.admin')

@section('title', 'Add New Item')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-gradient bg-success text-white rounded-top-4">
            <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Add New Item</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Name --}}
                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">Item Name</label>
                    <input type="text" name="name" id="name" class="form-control shadow-sm" 
                           value="{{ old('name', $item->name ?? '') }}" required>
                </div>

                {{-- Description --}}
                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" class="form-control shadow-sm" 
                              rows="4" required>{{ old('description', $item->description ?? '') }}</textarea>
                </div>

                {{-- Category --}}
                <div class="mb-4">
                    <label for="category" class="form-label fw-semibold">Category</label>
                    <select name="category_id" id="category" class="form-select shadow-sm" required>
                        <option value="" disabled selected>Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ (old('category_id', $item->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Prices --}}
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="regular_price" class="form-label fw-semibold">Regular Price (LKR)</label>
                        <input type="number" name="regular_price" step="0.01" id="regular_price" 
                               class="form-control shadow-sm" 
                               value="{{ old('regular_price', $item->regular_price ?? '') }}" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="real_price" class="form-label fw-semibold">Real Price (LKR)</label>
                        <input type="number" name="real_price" step="0.01" id="real_price" 
                               class="form-control shadow-sm" 
                               value="{{ old('real_price', $item->real_price ?? '') }}" required>
                    </div>
                </div>

                {{-- Image Upload --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Upload Image</label>
                    <input type="file" name="image" class="form-control shadow-sm" accept="image/*" onchange="previewImage(event)">
                    <div class="mt-3">
                        <img id="imagePreview" 
                             src="{{ !empty($item->image) ? asset('storage/' . $item->image) : '#' }}"
                             class="img-thumbnail {{ !empty($item->image) ? '' : 'd-none' }}" 
                             width="150" alt="Image Preview">
                    </div>
                </div>

                {{-- Submit --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4 shadow-sm">
                        <i class="fas fa-save me-2"></i>Save Item
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
        } else {
            imagePreview.src = '#';
            imagePreview.classList.add('d-none');
        }
    }
</script>
@endsection
