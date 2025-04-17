@extends('layouts.web')

@section('title', 'About Us - Rajapaksha Traders')

@section('content')
<div class="about-page">
    <!-- Hero Section -->
    <section class="hero-section bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold text-primary">About Rajapaksha Traders</h1>
                    <p class="lead">Your trusted retail partner since 1995</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/header.jpg') }}" alt="Rajapaksha Traders Store Front" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <img src="{{ asset('images/history.jpg') }}" alt="Our History" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6 order-lg-1">
                    <h2 class="fw-bold text-primary mb-4">Our Story</h2>
                    <p>Founded in 1995 by Mr. Sunil Rajapaksha, Rajapaksha Traders began as a small neighborhood shop with a vision to provide quality products at affordable prices to our community.</p>
                    <p>Over the years, we've grown into one of the most trusted retail stores in the area, serving generations of families with the same commitment to quality and service that we started with.</p>
                    <p>Today, under the leadership of the second generation, we continue to innovate while staying true to our core values.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Mission -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary">Our Mission & Values</h2>
                <p class="lead">What drives us every day</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="icon-box bg-primary text-white rounded-circle mx-auto mb-3">
                                <i class="bi bi-bullseye fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Our Mission</h5>
                            <p>To provide high-quality products with exceptional customer service at competitive prices, making everyday shopping a pleasant experience for our community.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="icon-box bg-primary text-white rounded-circle mx-auto mb-3">
                                <i class="bi bi-heart fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Our Values</h5>
                            <p>Integrity, Quality, Community, Innovation, and Customer Satisfaction are the pillars that guide every decision we make at Rajapaksha Traders.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="icon-box bg-primary text-white rounded-circle mx-auto mb-3">
                                <i class="bi bi-eye fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Our Vision</h5>
                            <p>To be the most trusted neighborhood retail store, expanding our reach while maintaining the personal touch that our customers love.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary">Meet Our Team</h2>
                <p class="lead">The faces behind Rajapaksha Traders</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('images/team-1.jpg') }}" class="card-img-top" alt="Sunil Rajapaksha">
                        <div class="card-body text-center">
                            <h5 class="fw-bold mb-1">Sunil Rajapaksha</h5>
                            <p class="text-muted">Founder & CEO</p>
                            <p>With over 25 years of retail experience, Sunil's vision continues to guide our business.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('images/team-2.jpg') }}" class="card-img-top" alt="Nimali Rajapaksha">
                        <div class="card-body text-center">
                            <h5 class="fw-bold mb-1">Nimali Rajapaksha</h5>
                            <p class="text-muted">Operations Manager</p>
                            <p>Ensuring our store runs smoothly and our customers are always satisfied.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('images/team-3.jpg') }}" class="card-img-top" alt="Our Staff">
                        <div class="card-body text-center">
                            <h5 class="fw-bold mb-1">Our Dedicated Staff</h5>
                            <p class="text-muted">Sales Associates</p>
                            <p>A team of friendly professionals ready to assist you with all your shopping needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Store Gallery -->
    <!-- <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary">Our Store</h2>
                <p class="lead">Take a look inside Rajapaksha Traders</p>
            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <a href="{{ asset('images/store-1.jpg') }}" data-fancybox="gallery">
                        <img src="{{ asset('images/store-1.jpg') }}" alt="Store Interior" class="img-fluid rounded shadow-sm gallery-img">
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ asset('images/store-2.jpg') }}" data-fancybox="gallery">
                        <img src="{{ asset('images/store-2.jpg') }}" alt="Product Selection" class="img-fluid rounded shadow-sm gallery-img">
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ asset('images/store-3.jpg') }}" data-fancybox="gallery">
                        <img src="{{ asset('images/store-3.jpg') }}" alt="Customer Service" class="img-fluid rounded shadow-sm gallery-img">
                    </a>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Visit Us -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-3">Visit Us Today</h2>
                    <p class="lead mb-4">Experience the Rajapaksha Traders difference for yourself.</p>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-geo-alt-fill fs-4 me-3"></i>
                        <p class="mb-0">123 Main Street, Colombo, Sri Lanka</p>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-telephone-fill fs-4 me-3"></i>
                        <p class="mb-0">+94 11 234 5678</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-clock-fill fs-4 me-3"></i>
                        <p class="mb-0">Open Daily: 8:00 AM - 8:00 PM</p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card shadow">
                        <div class="card-body p-0">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798511757687!2d79.8527554153281!3d6.921687795003816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTUnMTguMSJOIDc5wrA1MScxNS4xIkU!5e0!3m2!1sen!2slk!4v1620000000000!5m2!1sen!2slk" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url('{{ asset("images/pattern-bg.png") }}');
        background-size: cover;
    }
    
    .icon-box {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .gallery-img {
        transition: transform 0.3s ease;
        height: 250px;
        width: 100%;
        object-fit: cover;
    }
    
    .gallery-img:hover {
        transform: scale(1.02);
    }
    
    .text-primary {
        color: #2c3e50 !important;
    }
    
    .bg-primary {
        background-color: #2c3e50 !important;
    }
</style>
@endsection

@section('scripts')
<!-- Fancybox for image gallery -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });
</script>
@endsection