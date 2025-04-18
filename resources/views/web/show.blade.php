@extends('layouts.web') {{-- Ensure this layout exists and has Bootstrap included --}}

@section('title', $item->name . ' - Rajapaksha Traders')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <div class="row g-4">
            <div class="col-md-5">
                <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/placeholder.png') }}" 
                     alt="{{ $item->name }}" 
                     class="img-fluid rounded shadow-sm" 
                     style="object-fit: cover; width: 100%; max-height: 400px;">
            </div>
            <div class="col-md-7">
                <h2 class="fw-bold mb-3">{{ $item->name }}</h2>

                <h5 class="text-muted">Price</h5>
                <p class="fs-5">
                    <del class="text-danger">Rs.{{ number_format($item->regular_price, 2) }}</del>
                    <span class="ms-2 text-success fw-bold">Rs.{{ number_format($item->real_price, 2) }}</span>
                </p>

                @php
                    $discount = 100 - ($item->real_price / $item->regular_price * 100);
                @endphp
                @if($discount > 0)
                    <span class="badge bg-warning text-secondary fs-7">{{ round($discount) }}% OFF</span>
                @endif

                <h5 class="text-muted">Description</h5>
                <p class="text-dark">{{ $item->description ?? 'No description available.' }}</p>

                <h5 class="text-muted">Category</h5>
                <p class="text-dark">{{ $item->category->name ?? 'N/A' }}</p>

                {{-- WhatsApp Button --}}
                <a href="https://wa.me/94714829005?text={{ urlencode("I'm interested in " . $item->name . " priced at Rs." . number_format($item->real_price, 2)) }}"
                    class="btn btn-success btn-lg mt-3" target="_blank">
                        <i class="bi bi-whatsapp"></i> Contact via WhatsApp
                    </a>
            </div>
        </div>
    </div>
</div>
@endsection
