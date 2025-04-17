@extends('layouts.web')

@section('title', 'Home - Rajapaksha Traders')

@section('content')

<section style="background-image: url('img/header.jpg');background-repeat: no-repeat;background-size: cover;">
      <div class="container-lg">
        <div class="row">
          <div class="col-lg-6 pt-5 mt-5">
            <h2 class="display-1 ls-1"><span class="fw-bold primery-color">Rajapaksha</span>  <span class="fw-bold primery-color">Traders</span></h2>
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

    <section class="py-3">
  <div class="container-lg">
    <div class="row g-3">
      
      {{-- Left side: Large banner (1st ad) --}}
      @if($ads->count() >= 1)
      <div class="col-md-6">
        <div class="banner-ad d-flex align-items-center h-100 "
             style="background: url('{{ asset('storage/' . $ads[0]->image) }}') no-repeat center center; background-size: cover;">
          <div class="banner-content p-5 w-100">
            <div class="content-wrapper text-light">
              <h3 class="banner-title text-light">{{ $ads[0]->title }}</h3>
              <p>{{ $ads[0]->description ?? '' }}</p>
              <a href="#" class="btn-link text-white fw-bold">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
      @endif

      {{-- Right side: 3 stacked smaller banners --}}
      <div class="col-md-6 d-flex flex-column gap-3">
        @foreach($ads->slice(1, 3) as $ad)
        <div class="banner-ad flex-fill"
             style="background: url('{{ asset('storage/' . $ad->image) }}') no-repeat center center; background-size: cover; min-height: 32%;">
          <div class="banner-content p-4 h-100 d-flex align-items-start">
            <div class="content-wrapper text-light">
              <h3 class="banner-title text-light">{{ $ad->title }}</h3>
              <p>{{ $ad->description ?? '' }}</p>
              <a href="#" class="btn-link text-white fw-bold">SHOP NOW</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

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
                  <img 
                    src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/default-category.jpg') }}" 
                    class="rounded-circle" 
                    alt="{{ $category->name }} Image" 
                    style="width:150px; height:150px; object-fit:cover;"
                  >
                  <h4 class="mt-2 fw-bold category-title" style="font-size: 1.25rem;">{{ $category->name }}</h4>
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
            <a href="{{ route('items.index') }}" class="btn btn-primary me-2">View All</a>
            <div class="swiper-buttons">
              <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
              <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
            </div>  
          </div>
        </div>

      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">

        <div class="swiper">
          <div class="swiper-wrapper">
            @foreach($items as $item)
              <div class="product-item swiper-slide">
                <figure>
                  <a href="{{ route('items.show', $item->id) }}" title="{{ $item->name }}">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/placeholder.png') }}" alt="{{ $item->name }}" class="tab-image">
                  </a>
                </figure>
                <div class="d-flex flex-column text-center">
                  <h3 class="fs-6 fw-normal">{{ $item->name }}</h3>
                  <div class="d-flex justify-content-center align-items-center gap-2">
                    <del>Rs.{{ number_format($item->regular_price, 2) }}</del>
                    <span class="text-dark fw-semibold">Rs.{{ number_format($item->real_price, 2) }}</span>

                    @php
                      $discount = 100 - ($item->real_price / $item->regular_price * 100);
                    @endphp
                    @if($discount > 0)
                      <span class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">
                        {{ round($discount) }}% OFF
                      </span>
                    @endif
                  </div>
                  <div class="button-area p-3 pt-0">
                    <div class="row g-1 mt-2">
                      <div class="col-3">
                        
                      </div>
                      <div class="col-7">
                        <a href="#" class="btn btn-primary rounded-1 p-2 fs-7 btn-cart">
                          <svg width="18" height="18"><use xlink:href="#cart"></use></svg> Whatsapp
                        </a>
                      </div>
                      <div class="col-2">
                       
                          
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<div class="row row-cols-1 row-cols-sm-3 row-cols-lg-3 g-0 justify-content-center">
          <div class="col">
            <div class="card border-0 bg-primary rounded-0 p-4 text-light">
              <div class="row">
                <div class="col-md-3 text-center">
                  <svg width="60" height="60"><use xlink:href="#fresh"></use></svg>
                </div>
                <div class="col-md-9">
                  <div class="card-body p-0">
                    <h5 class="text-light">Fresh from farm</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-0 bg-secondary rounded-0 p-4 text-light">
              <div class="row">
                <div class="col-md-3 text-center">
                  <svg width="60" height="60"><use xlink:href="#organic"></use></svg>
                </div>
                <div class="col-md-9">
                  <div class="card-body p-0">
                    <h5 class="text-light">100% Organic</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-0 bg-danger rounded-0 p-4 text-light">
              <div class="row">
                <div class="col-md-3 text-center">
                  <svg width="60" height="60"><use xlink:href="#delivery"></use></svg>
                </div>
                <div class="col-md-9">
                  <div class="card-body p-0">
                    <h5 class="text-light">Free delivery</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      </div>
  




    @endsection
