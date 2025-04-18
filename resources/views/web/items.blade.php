]@extends('layouts.web')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">Items in Category: {{ $category->name }}</h2>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-5">
  @foreach($category->items as $item)
    <div class="col">
      <div class="product-item card border-0 shadow-sm h-100">
        <figure class="mb-0">
          <a href="{{ route('web.show', $item->id) }}" title="{{ $item->name }}">
            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/placeholder.png') }}"
                 alt="{{ $item->name }}"
                 class="tab-image w-100"
                 style="object-fit: cover; height: 200px;">
          </a>
        </figure>
        <div class="card-body text-center p-2">
          <h3 class="fs-6 fw-normal mb-1">{{ $item->name }}</h3>
          <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
            @if($item->regular_price > $item->real_price)
              <del class="text-muted small">Rs.{{ number_format($item->regular_price, 2) }}</del>
            @endif
            <span class="text-dark fw-semibold">Rs.{{ number_format($item->real_price, 2) }}</span>

            @php
              $discount = ($item->regular_price > 0 && $item->regular_price > $item->real_price)
                  ? round(100 - ($item->real_price / $item->regular_price * 100))
                  : 0;
            @endphp

            @if($discount > 0)
              <span class="badge bg-warning text-secondary fs-7">{{ round($discount) }}% OFF</span>
            @endif
          </div>
          <a href="https://wa.me/94714829005?text={{ urlencode("I'm interested in " . $item->name . " priced at Rs." . number_format($item->real_price, 2)) }}"
             class="btn btn-primary btn-sm rounded-1 w-100">
            <svg width="18" height="18"><use xlink:href="#cart"></use></svg> Whatsapp
          </a>
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
