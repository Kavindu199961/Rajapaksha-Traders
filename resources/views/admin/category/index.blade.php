@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">All Categories</h2>
    <a href="{{ route('category.create') }}" class="btn btn-primary">+ Add Category</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($categories->count())
    <div class="row g-4">
        @foreach($categories as $category)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm rounded-4">
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top rounded-top-4" style="height: 180px; object-fit: cover;" alt="{{ $category->name }}">
                    @else
                        <img src="{{ asset('images/default-category.jpg') }}" class="card-img-top rounded-top-4" style="height: 180px; object-fit: cover;" alt="Default Image">
                    @endif

                    <div class="card-body text-center">
                        <h5 class="card-title fw-semibold">{{ $category->name }}</h5>
                        <p class="text-muted mb-2 small">Created: {{ $category->created_at->format('Y-m-d') }}</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning px-3">Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger px-3">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info">No categories found.</div>
@endif
@endsection
