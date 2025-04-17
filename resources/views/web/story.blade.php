@extends('layouts.web')

@section('title', 'Our Story - Rajapaksha Traders')

@section('content')
<div class="story-page">
    <!-- Hero Section -->
    <section class="hero-section py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('img/story.jpg') }}') no-repeat center center; background-size: cover;">
        <div class="container text-white text-center py-5">
            <h1 class="display-4 font-weight-bold mb-3 text-white">Our Story</h1>
            <p class="lead">The journey of Rajapaksha Traders</p>
        </div>
    </section>

    <!-- Story Timeline -->
    <section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if($stories && $stories->count() > 0)
                    @foreach($stories->sortByDesc('created_at') as $index => $story)
                    <div class="story-card mb-5">
                        <div class="row align-items-center">
                            <div class="col-md-6 order-md-1">
                                @if($story->image)
                                <div class="story-image-wrapper">
                                    <img src="{{ asset('storage/'.$story->image) }}" alt="{{ $story->title }}" class="img-fluid rounded shadow">
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6 order-md-2">
                                <div class="story-content p-4">
                                    <h2 class="mb-3">{{ $story->title }}</h2>
                                    <div class="story-text">
                                        {!! $story->content !!}
                                    </div>
                                    <div class="story-meta mt-4">
                                        <span class="text-muted">Published: {{ $story->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Section -->
                        @if($story->galleries->count() > 0)
                        <div class="story-gallery mt-5">
                            <h3 class="text-center mb-4">Gallery</h3>
                            <div class="row">
                                @foreach($story->galleries as $gallery)
                                <div class="col-md-4 mb-4">
                                    <a href="{{ asset('storage/'.$gallery->image_path) }}" data-lightbox="story-gallery-{{ $story->id }}" data-title="{{ $story->title }}">
                                        <img src="{{ asset('storage/'.$gallery->image_path) }}" class="img-fluid rounded shadow-sm" alt="Gallery Image">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    @if(!$loop->last)
                        <hr class="my-5">
                    @endif
                    @endforeach
                @else
                    <div class="text-center py-5">
                        <h3>No stories available at the moment</h3>
                        <p>Please check back later</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
</div>
@endsection

@section('styles')
<style>
    .hero-section {
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .story-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .story-card:hover {
        transform: translateY(-5px);
    }
    
    .story-image-wrapper {
        height: 100%;
        padding: 15px;
    }
    
    .story-image-wrapper img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }
    
    .story-content {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .story-text {
        line-height: 1.8;
        color: #555;
    }
    
    .story-gallery img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .story-gallery img:hover {
        transform: scale(1.03);
    }
    
    @media (max-width: 768px) {
        .story-image-wrapper img {
            height: 250px;
        }
        
        .story-gallery img {
            height: 200px;
        }
    }
</style>
@endsection

@section('scripts')
<!-- Lightbox for gallery images -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel': 'Image %1 of %2'
    });
</script>
@endsection