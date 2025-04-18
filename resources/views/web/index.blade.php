@extends('layouts.web')

@section('title', 'Home - Rajapaksha Traders')

@section('meta')
    <meta name="description" content="Rajapaksha Traders Galigamuwa Kobbawala - Your trusted retail shop in Sri Lanka for milk, chocolate, rice, sugar, and various household items. Best prices and quality products.">
    <meta name="keywords" content="Rajapaksha Traders, Galigamuwa, Kobbawala, Sri Lanka retail shop, milk, chocolate, rice, sugar, grocery items, household items">
    <meta name="author" content="Rajapaksha Traders">
    <meta property="og:title" content="Rajapaksha Traders - Retail Shop in Galigamuwa Kobbawala">
    <meta property="og:description" content="Your trusted retail shop in Sri Lanka for milk, chocolate, rice, sugar, and various household items.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}"> <!-- Replace with your actual logo path -->
    <meta name="twitter:card" content="summary_large_image">
    <title>Rajapaksha Traders - Retail Shop Galigamuwa Kobbawala | Sri Lanka</title>
@endsection

@section('content')

<section style="background-image: url('img/homehero.jpg');background-repeat: no-repeat;background-size: cover;">
      <div class="container-lg">
        <div class="row">
          <div class="col-lg-6 pt-5 mt-5">
            <h2 class="display-1 ls-1"><span class="fw-bold text-white">Rajapaksha</span>  <span class="fw-bold text-white">Traders</span></h2>
            <p class="fs-4">Dignissim massa diam elementum.</p>
            <div class="d-flex gap-3">
              <a href="#" class="btn btn-primary text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">Start Shopping</a>
              
            </div>
            <div class="row my-5 bg-light rounded-3 p-4 w-75">
              <div class="col">
                <div class="row text-dark">
                  <div class="col-auto"><p class="fs-1 fw-bold lh-sm mb-0">14k+</p></div>
                  <div class="col"><p class="text-uppercase lh-sm mb-0">Product Varieties</p></div>
                </div>
              </div>
              <div class="col">
                <div class="row text-dark">
                  <div class="col-auto"><p class="fs-1 fw-bold lh-sm mb-0">50k+</p></div>
                  <div class="col"><p class="text-uppercase lh-sm mb-0">Happy Customers</p></div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        
        
      </div>
    </section>

    <!-- banner section -->
    <section>
    <div class="container-fluid px-5 my-5">
        <div class="text-center mb-5">
            <h2 class="section-title">Today's Offers</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach ($ads->take(4) as $ad)
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="ad-item text-center">
                        <img src="{{ asset('storage/' . $ad->image) }}" alt="{{ $ad->alt_text }}"
                             class="img-fluid rounded shadow"
                             style="width: 100%; height: 400px; object-fit: cover;">
                        <!-- <h5 class="mt-3">{{ $ad->title }}</h5> -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- category section -->

    <section class="py-5 overflow-hidden">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-12">

            <div class="section-header d-flex flex-wrap justify-content-between mb-5">
              <h2 class="section-title">Category</h2>

              <div class="d-flex align-items-center">
             <a href="#" class="btn btn-primary me-2">View All</a>
                <div class="swiper-buttons">
                  <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                  <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="row">
        <div class="col-md-12">
          <div class="category-carousel swiper">
            <div class="swiper-wrapper d-flex flex-row">
            @foreach($categories as $category)
              <div class="text-center mx-3 swiper-slide">
                <a href="{{ route('web.items', $category->id) }}" class="nav-link d-flex flex-column align-items-center gap-2 text-dark p-2">
                  <img 
                    src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/default-category.jpg') }}" 
                    class="rounded-circle" 
                    alt="{{ $category->name }} Image" 
                    style="width:150px; height:150px; object-fit:cover;"
                  >
                  <h4 class="mt-2 fw-bold category-title" style="font-size: 1.25rem;">{{ $category->name }}</h4>
                </a>
              </div>
            @endforeach

            </div>
          </div>
        </div>
      </div>

      </div>
    </section>

<!-- item section -->

<section id="featured-products" class="products-carousel">
  <div class="container-lg overflow-hidden py-5">
    <div class="row">
      <div class="col-md-12">

        <div class="section-header d-flex flex-wrap justify-content-between my-4">
          <h2 class="section-title">Featured Products</h2>

          <div class="d-flex align-items-center">
            <a href="/products" class="btn btn-primary me-2">View All</a>
            <div class="swiper-buttons">
              
            </div>  
          </div>
        </div>

      </div>
    </div>
    
    <div class="container py-4">
  <div class="row">
    <div class="col-md-12">
      <div class="row g-5">
        @foreach($items as $item)
          <div class="col-6 col-md-3">
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
        @endforeach
      </div>
  </div>
</section>
<section>

<!-- Elfsight Google Reviews | Untitled Google Reviews -->
<script src="https://static.elfsight.com/platform/platform.js" async></script>
<div class="elfsight-app-b4ba8fc9-823d-4646-8fb8-e342ef2b32b8" data-elfsight-app-lazy></div>
</section><br>

<div class="row row-cols-1 row-cols-sm-3 row-cols-lg-3 g-0 justify-content-center">
  <!-- SVG Definitions (hidden) -->
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="premium" viewBox="0 0 24 24">
      <path fill="currentColor" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
    </symbol>
    <symbol id="variety" viewBox="0 0 24 24">
      <path fill="currentColor" d="M20 6h-4V4c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zM10 4h4v2h-4V4zm6 11h-3v3h-2v-3H8v-2h3v-3h2v3h3v2z"/>
    </symbol>
    <symbol id="fast-delivery" viewBox="0 0 24 24">
      <path fill="currentColor" d="M18 18.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zm1.5-9H17V12h4.46L19.5 9.5zM6 18.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 8l3 4v5h-2c0 1.66-1.34 3-3 3s-3-1.34-3-3H9c0 1.66-1.34 3-3 3s-3-1.34-3-3H1V6c0-1.11.89-2 2-2h14v4h3zM15 8H3v3h12V8zm0 5H3v3h12v-3z"/>
    </symbol>
  </svg>

  <!-- Premium Quality Card -->
  <div class="col">
    <div class="card border-0 bg-primary rounded-0 p-4 text-light h-100">
      <div class="row">
        <div class="col-md-3 text-center">
          <svg width="60" height="60" fill="white">
            <use xlink:href="#premium"></use>
          </svg>
        </div>
        <div class="col-md-9">
          <div class="card-body p-0">
            <h5 class="text-light">Premium Quality</h5>
            <p class="card-text">Finest selection of rice, dairy, biscuits & chocolates with guaranteed quality.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Wide Selection Card -->
  <div class="col">
    <div class="card border-0 bg-secondary rounded-0 p-4 text-light h-100">
      <div class="row">
        <div class="col-md-3 text-center">
          <svg width="60" height="60" fill="white">
            <use xlink:href="#variety"></use>
          </svg>
        </div>
        <div class="col-md-9">
          <div class="card-body p-0">
            <h5 class="text-light">Wide Selection</h5>
            <p class="card-text">From aromatic basmati to creamy chocolates - all in one place.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Fast Delivery Card -->
  <div class="col">
    <div class="card border-0 bg-danger rounded-0 p-4 text-light h-100">
      <div class="row">
        <div class="col-md-3 text-center">
          <svg width="60" height="60" fill="white">
            <use xlink:href="#fast-delivery"></use>
          </svg>
        </div>
        <div class="col-md-9">
          <div class="card-body p-0">
            <h5 class="text-light">Fast Delivery</h5>
            <p class="card-text">Same-day delivery for orders before 3pm. Free delivery on orders over Rs6000.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 @endsection
