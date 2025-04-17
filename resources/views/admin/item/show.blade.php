@extends('layouts.web') {{-- Make sure this layout exists --}}

@section('title', 'Items - Rajapaksha Traders')

@section('content')
<div class="container py-4">
    <h2 class="mb-3">{{ $item->name }}</h2>

    <div class="row">
        <div class="col-md-5">
            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/placeholder.png') }}" alt="{{ $item->name }}" class="img-fluid rounded">
        </div>
        <div class="col-md-7">
            <h4>Price</h4>
            <p>
                <del>${{ number_format($item->regular_price, 2) }}</del>
                <strong class="ms-2 text-success">${{ number_format($item->real_price, 2) }}</strong>
            </p>

            <h4>Description</h4>
            <p>{{ $item->description ?? 'No description available.' }}</p>

            <h4>Category</h4>
            <p>{{ $item->category->name ?? 'N/A' }}</p>

           
        </div>
    </div>
</div>
@endsection
