@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Ads List</h2>
        <a href="{{ route('ads.create') }}" class="btn btn-success shadow">+ Create Ad</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($ads->count())
        <div class="row g-4">
            @foreach ($ads as $ad)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100 border-0 rounded-4">
                        <img src="{{ asset('storage/' . $ad->image) }}" class="card-img-top rounded-top-4" alt="{{ $ad->title }}" style="height: 220px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            <div class="mt-3">
                                <a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-warning w-100">Edit</a>
                                {{-- Optional: Add delete button here --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No ads found. Click "Create Ad" to add your first one.</div>
    @endif
</div>
@endsection
