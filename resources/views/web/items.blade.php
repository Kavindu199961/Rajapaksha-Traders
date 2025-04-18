]@extends('layouts.web')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">Items in Category: {{ $category->name }}</h2>

  <div class="row g-4">
    @foreach($category->items as $item)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="product-item p-3 shadow-sm rounded border bg-white h-100 d-flex flex-column justify-content-between">
          
          <!-- Image -->
          <figure class="text-center mb-3">
            <a href="{{ route('web.show', $item->id) }}">
              <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/placeholder.png') }}"
                  alt="{{ $item->name }}"
                  class="img-fluid"
                  style="height: 180px; object-fit: contain;">
            </a>
          </figure>

          <!-- Product Info -->
          <div class="text-center mb-3">
            <h3 class="fs-6 fw-bold mb-2">{{ $item->name }}</h3>
            <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
              @if($item->regular_price > $item->real_price)
                <del class="text-muted">Rs.{{ number_format($item->regular_price, 2) }}</del>
              @endif
              <span class="text-dark fw-semibold">Rs.{{ number_format($item->real_price, 2) }}</span>
              @php
                $discount = ($item->regular_price > 0 && $item->regular_price > $item->real_price)
                    ? round(100 - ($item->real_price / $item->regular_price * 100))
                    : 0;
              @endphp
              @if($discount > 0)
                <span class="badge bg-warning text-dark rounded-1 px-2">
                  {{ $discount }}% OFF
                </span>
              @endif
            </div>
          </div>

          <!-- Buttons -->
          <div class="row g-1 align-items-center mt-auto">
            
          <div class="col-6 d-flex justify-content-center">
            <a href="#" class="btn btn-sm btn-success w-100 rounded-1 btn-cart align-items-center">
                <svg width="16" height="16"><use xlink:href="#cart"></use></svg> Whatsapp
            </a>
            </div>
            
          </div>

        </div>
      </div>
    @endforeach
  </div>
</div>

<style>
    .product-item {
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.product-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}
</style>
@endsection
