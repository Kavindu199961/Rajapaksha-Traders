@extends('layouts.web')

@section('title', 'Transport & Hire Services - Rajapaksha Traders')

@section('meta')
    <meta name="description" content="Rajapaksha Transport - Reliable transportation services in Sri Lanka. Offering goods transport, logistics solutions, and freight services with professional handling and timely deliveries.">
    <meta name="keywords" content="Rajapaksha Transport, Sri Lanka transport services, goods transportation, logistics solutions, freight services, cargo transport, delivery services">
    <meta name="author" content="Rajapaksha Transport">
    <meta property="og:title" content="Rajapaksha Transport - Professional Transport Services in Sri Lanka">
    <meta property="og:description" content="Your trusted partner for transportation and logistics solutions in Sri Lanka. Reliable goods transport and freight services.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('img/lorry.jpg') }}"> <!-- Replace with your actual transport company logo -->
    <meta name="twitter:card" content="summary_large_image">
    <title>Rajapaksha Transport | Professional Goods Transport & Logistics Services | Sri Lanka</title>
@endsection

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<div class="transport-page">
    <!-- Hero Section -->
    <section class="hero-section bg-light py-5" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('img/lorry.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container text-white text-center py-5">
            <h1 class="display-4 fw-bold text-white">Transport & Hire Services</h1>
            <p class="lead">Reliable goods transportation solutions for your business needs</p>
            <a href="#hire-now" class="btn btn-primary btn-lg mt-3">
                <i class="bi bi-calendar-check me-2"></i> Book Now
            </a>
        </div>
    </section>

    <!-- Our Services -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold primery-color">Our Transport Services</h2>
                <p class="lead">Quality transportation solutions for all your needs</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm transport-card">
                        <div class="card-img-top transport-icon-box bg-primary text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-truck fs-1"></i>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="fw-bold">Goods Transportation</h4>
                            <p>Safe and timely delivery of goods across the region</p>
                            <ul class="text-start ps-4">
                                <li>Up to 2500kg capacity</li>
                                <li>Daily/weekly rentals</li>
                                <li>Experienced drivers</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm transport-card">
                        <div class="card-img-top transport-icon-box bg-warning text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-building fs-1"></i>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="fw-bold">Construction Materials</h4>
                            <p>Specialized transport for construction supplies</p>
                            <ul class="text-start ps-4">
                                <li>Cement, bricks</li>
                                <li>Metal rods & timber</li>
                                <li>Debris removal</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm transport-card">
                        <div class="card-img-top transport-icon-box bg-success text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-shop fs-1"></i>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="fw-bold">Retail Deliveries</h4>
                            <p>Regular delivery service for shops and businesses</p>
                            <ul class="text-start ps-4">
                                <li>Scheduled routes</li>
                                <li>Temperature control</li>
                                <li>Stock management</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Vehicle -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold primery-color mb-4">Our Transport Vehicle</h2>
                    <div class="vehicle-details mb-4">
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <i class="bi bi-speedometer2 fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">Tata Lorry 2500</h5>
                                <p>Capacity: 2500kg | Dimensions: 15ft x 7ft x 6ft</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <i class="bi bi-check-circle fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">Features</h5>
                                <ul>
                                    <li>Well-maintained with regular servicing</li>
                                    <li>GPS tracking available</li>
                                    <li>Tarpaulin cover for weather protection</li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="me-4">
                                <i class="bi bi-shield-check fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">Insurance</h5>
                                <p>Fully insured for goods in transit and third-party liability</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="vehicle-gallery">
                        <div class="main-image mb-3">
                            <img src="{{ asset('img/lorry1.jpg') }}" alt="Our Lorry" class="img-fluid rounded shadow">
                        </div>
                        <div class="thumbnail-row d-flex gap-2">
                            <img src="{{ asset('img/lorry3.jpg') }}" alt="Lorry Side View" class="img-thumbnail preview-img" data-bs-toggle="modal" data-bs-target="#imageModal">
                            <img src="{{ asset('img/lorry2.jpeg') }}" alt="Lorry Rear View" class="img-thumbnail preview-img" data-bs-toggle="modal" data-bs-target="#imageModal">
                            <img src="{{ asset('img/lorry4.png') }}" alt="Lorry Interior" class="img-thumbnail preview-img" data-bs-toggle="modal" data-bs-target="#imageModal">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Preview Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-light">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="imageModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid rounded shadow" alt="Preview Image">
            </div>
            </div>
        </div>
        </div>


    <!-- Hire Now Section -->
    <section id="hire-now" class="py-5" style="background-color:rgb(186, 189, 183);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 hire-card" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
                    <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-5">
                    
                        <i class="bi bi-truck fs-1"></i>
                   
                        <h2 class="fw-bold mb-2" style="color: #2c3e50;">Book Your Lorry Transport</h2>
                        <p class="text-muted">Quick and reliable logistics solutions at your fingertips</p>
                    </div>
                    
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 p-4 text-center" style="border-radius: 12px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                
                                    <i class="bi bi-whatsapp fs-4"></i><br>
                                
                                <h4 class="mb-2" style="color: #2c3e50;">Instant WhatsApp Booking</h4>
                                <p class="text-muted mb-3">Get immediate confirmation via WhatsApp</p>
                                <a href="https://wa.me/+94714829005" class="btn btn-success rounded-pill px-4" style="background-color: #25D366; border-color: #25D366;">
                                    <i class="bi bi-whatsapp me-2"></i> Message Now
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card h-100 border-0 p-4 text-center" style="border-radius: 12px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                            
                            <i class="bi bi-telephone fs-4"></i><br> 
                        
                            <h4 class="mb-2" style="color: #2c3e50;">Direct Call Booking</h4>
                            <p class="text-muted mb-3">Speak with our transport manager</p>
                            <a href="tel:+94714829005" class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-telephone me-2"></i> Call Now
                            </a>
                        </div>
                        </div>
                    </div>
                        
                        <div class="or-divider my-4 position-relative text-center">
                            <hr class="m-0" style="border-top: 1px dashed #dee2e6;">
                            <span class="position-absolute px-3 bg-white" style="top: 50%; left: 50%; transform: translate(-50%, -50%); color: #6c757d; font-weight: 500;">OR</span>
                        </div>
                        
                        <div class="booking-form-container p-4" style="border-radius: 12px; background-color: #ffffff; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                            <h4 class="text-center mb-4" style="color: #2c3e50;">Send Booking Request</h4>
                            <form action="{{ route('send.transport.inquiry') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-medium">Your Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                                            <input type="text" class="form-control border-start-0" id="name" name="name" placeholder="Mihiranga Rajapksha" required>
                                        </div>
                                        <div class="invalid-feedback">Please provide your name.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-medium">Email Address <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                            <input type="email" class="form-control border-start-0" id="email" name="email" placeholder="example@domain.com" required>
                                        </div>
                                        <div class="invalid-feedback">Please provide a valid email address.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label fw-medium">Phone Number <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-telephone text-muted"></i></span>
                                            <input type="tel" class="form-control border-start-0" id="phone" name="phone" placeholder="+94 71 482 9005 " required>
                                        </div>
                                        <div class="invalid-feedback">Please provide a valid phone number.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date" class="form-label fw-medium">Required Date <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-calendar text-muted"></i></span>
                                            <input type="date" class="form-control border-start-0" id="date" name="required_date" required>
                                        </div>
                                        <div class="invalid-feedback">Please select a date.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="duration" class="form-label fw-medium">Duration <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-clock text-muted"></i></span>
                                            <select class="form-select border-start-0" id="duration" name="duration" required>
                                                <option value="" selected disabled>Select duration</option>
                                                <option value="1">1 Day</option>
                                                <option value="2">2 Days</option>
                                                <option value="3">3 Days</option>
                                                <option value="7">1 Week</option>
                                                <option value="30">1 Month</option>
                                            </select>
                                        </div>
                                        <div class="invalid-feedback">Please select duration.</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="goods" class="form-label fw-medium">Type of Goods <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-box-seam text-muted"></i></span>
                                            <input type="text" class="form-control border-start-0" id="goods" name="goods_type" placeholder="e.g., Construction materials, Furniture" required>
                                        </div>
                                        <div class="invalid-feedback">Please specify the type of goods.</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="details" class="form-label fw-medium">Additional Details</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light align-items-start pt-2 border-end-0"><i class="bi bi-info-circle text-muted"></i></span>
                                            <textarea class="form-control border-start-0" id="details" name="additional_details" rows="3" placeholder="Any special requirements or instructions..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg px-4 rounded-pill" id="submitBtn" style="background-color: #4e73df; border-color: #4e73df; min-width: 180px;">
                                            <span id="buttonText">
                                                <i class="bi bi-send-fill me-2"></i> Send Request
                                            </span>
                                            <span id="buttonSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Success Modal -->
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Message Sent!',
            text: '{{ session('success') }}',
            showConfirmButton: true,
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK',
            background: '#f8f9fa',
            iconColor: '#28a745'
        });
    </script>
    @endif 

    


    <style>
        .hire-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        
        .hire-option:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
            transition: all 0.3s ease;
        }
        
        .form-control, .form-select {
            border-radius: 8px !important;
            padding: 10px 15px;
            border: 1px solid #e0e0e0;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.15);
        }
        
        .input-group-text {
            border-radius: 8px 0 0 8px !important;
            background-color: #f8f9fa !important;
        }
        
        .btn {
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .icon-box {
            transition: all 0.3s ease;
        }
        
        .hire-option:hover .icon-box {
            transform: scale(1.1);
        }
    </style>

    <script>

    document.addEventListener("DOMContentLoaded", function () {
        const previewImgs = document.querySelectorAll(".preview-img");
        const modalImage = document.getElementById("modalImage");

        previewImgs.forEach(img => {
            img.addEventListener("click", function () {
                modalImage.src = this.src;
            });
        });
    });


    </script>
</section>

    <!-- Pricing Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold primery-color">Our Pricing</h2>
                <p class="lead">Competitive rates for all your transport needs</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm price-card">
                        <div class="card-header bg-primary text-white text-center py-3">
                            <h4 class="fw-bold mb-0 text-white">Daily Hire</h4>
                        </div>
                        <div class="card-body text-center">
                            <h3 class="fw-bold my-3">Rs. 8,000</h3>
                            <p class="text-muted">per day</p>
                            <ul class="list-unstyled mb-4">
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> 8 hours service</li>
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Up to 50km radius</li>
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Driver included</li>
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Fuel extra</li>
                            </ul>
                            <a href="#hire-now" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm price-card featured">
                        <div class="card-header bg-success text-white text-center py-3">
                            <h4 class="fw-bold mb-0">Weekly Package</h4>
                        </div>
                        <div class="card-body text-center">
                            <h3 class="fw-bold my-3">Rs. 45,000</h3>
                            <p class="text-muted">per week</p>
                            <ul class="list-unstyled mb-4">
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> 6 days service</li>
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Up to 100km radius</li>
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Driver included</li>
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> 10% fuel discount</li>
                            </ul>
                            <a href="#hire-now" class="btn btn-success">Best Value</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm price-card">
                        <div class="card-header bg-primary text-white text-center py-3">
                            <h4 class="fw-bold mb-0 text-white">Monthly Rental</h4>
                        </div>
                        <div class="card-body text-center">
                            <h3 class="fw-bold my-3">Rs. 150,000</h3>
                            <p class="text-muted">per month</p>
                            <ul class="list-unstyled mb-4">
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Full-time service</li>
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Islandwide</li>
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Dedicated driver</li>
                                <li class="py-2"><i class="bi bi-check-circle-fill text-success me-2"></i> 15% fuel discount</li>
                            </ul>
                            <a href="#hire-now" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    
</div>
@endsection

@section('styles')
<style>
    .hero-section {
        background-size: cover;
      
        background-position: center;
    }
    
    .transport-icon-box {
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0;
    }
    
    .transport-card {
        transition: transform 0.3s ease;
    }
    
    .transport-card:hover {
        transform: translateY(-10px);
    }
    
    .vehicle-gallery .img-thumbnail {
        width: 100px;
        height: 70px;
        object-fit: cover;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .vehicle-gallery .img-thumbnail:hover,
    .vehicle-gallery .img-thumbnail.active {
        border-color: #2c3e50;
        transform: scale(1.05);
    }
    
    .hire-card {
        border-radius: 15px;
        overflow: hidden;
    }
    
    .hire-option {
        transition: all 0.3s ease;
        border-radius: 10px;
    }
    
    .hire-option:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .or-divider::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #ddd;
        z-index: -1;
    }
    
    .price-card {
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .price-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    
    .price-card.featured {
        border: 2px solid #28a745;
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
<script>
    // Image gallery functionality
    document.querySelectorAll('.img-thumbnail').forEach(thumb => {
        thumb.addEventListener('click', function() {
            // Remove active class from all thumbnails
            document.querySelectorAll('.img-thumbnail').forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked thumbnail
            this.classList.add('active');
            
            // Update main image (in a real implementation, you'd change the src)
            const mainImg = document.querySelector('.main-image img');
            // mainImg.src = this.src; // Uncomment when you have actual different images
        });
    });
    
    // Form submission
    document.getElementById('hireForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Thank you for your booking request! We will contact you shortly to confirm.');
        this.reset();
    });
</script>
