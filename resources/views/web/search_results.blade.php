@extends('layouts.web')

@section('meta')
    <meta name="description" content="Search results for {{ $query }} at Rajapaksha Traders Galigamuwa Kobbawala">
    <meta name="keywords" content="Search, Rajapaksha Traders, {{ $query }}, Galigamuwa, Kobbawala">
    <meta property="og:title" content="Search Results for {{ $query }} - Rajapaksha Traders">
    <meta property="og:description" content="Search results for {{ $query }} at Rajapaksha Traders">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <title>Search Results for "{{ $query }}" - Rajapaksha Traders</title>
@endsection

@section('content')
<div class="container py-4">
  <h5 class="mb-4">Search Results for "{{ $query }}"</h5>

  <div class="row">
    <div class="col-md-12">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-5">
        @forelse($items as $item)
          <div class="col">
            <div class="product-item card border-0 shadow-sm h-100">
              <figure class="mb-0">
                <a href="{{ route('web.show', $item->id) }}" title="{{ $item->name }}">
                  <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/placeholder.png') }}" alt="{{ $item->name }}" class="tab-image w-100" style="object-fit: cover; height: 200px;">
                </a>
              </figure>
              <div class="card-body text-center p-2">
                <h3 class="fs-6 fw-normal mb-1">{{ $item->name }}</h3>
                <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
                  <del class="text-muted small">Rs.{{ number_format($item->regular_price, 2) }}</del>
                  <span class="text-dark fw-semibold">Rs.{{ number_format($item->real_price, 2) }}</span>
                  @php
                    $discount = 100 - ($item->real_price / $item->regular_price * 100);
                  @endphp
                  @if($discount > 0)
                    <span class="badge bg-warning text-secondary fs-7">{{ round($discount) }}% OFF</span>
                  @endif
                </div>
                <a href="https://wa.me/94714829005?text={{ urlencode("I'm interested in " . $item->name . " priced at Rs." . number_format($item->real_price, 2)) }}" class="btn btn-primary btn-sm rounded-1 w-100">
                  <svg width="18" height="18"><use xlink:href="#cart"></use></svg> Whatsapp
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <p class="text-center">No items found for "{{ $query }}".</p>
          </div>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection