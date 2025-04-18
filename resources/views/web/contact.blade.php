@extends('layouts.web')

@section('title', 'Contact Us - Rajapaksha Traders')

@section('content')
<div class="contact-page">
    <!-- Contact Hero Section -->
    <!-- Hero Section -->
    <section class="hero-section py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('img/contact.jpg') }}') no-repeat center center; background-size: cover;">
        <div class="container text-white text-center py-5">
            <h1 class="display-4 font-weight-bold mb-3 text-white">Contact Us</h1>
            <p class="lead"></p>
        </div>
    </section>

    <!-- Contact Options -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold primery-color">How to Reach Us</h2>
                <p class="lead">Choose your preferred contact method</p>
            </div>
            <div class="row g-4">
                <!-- WhatsApp -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center p-4">
                            <div class="icon-box bg-success text-white rounded-circle mx-auto mb-3">
                                <i class="bi bi-whatsapp fs-3"></i>
                            </div>
                            <h5 class="fw-bold">WhatsApp</h5>
                            <p class="mb-3">Chat with us instantly</p>
                            <a href="https://wa.me/94771234567" class="btn btn-success rounded-pill px-4">
                                <i class="bi bi-whatsapp me-2"></i> Message Now
                            </a>
                            <p class="mt-2 small text-muted">Typically replies within 30 minutes</p>
                        </div>
                    </div>
                </div>
                
                <!-- Phone Call -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center p-4">
                            <div class="icon-box bg-primary text-white rounded-circle mx-auto mb-3">
                                <i class="bi bi-telephone-fill fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Phone Call</h5>
                            <p class="mb-3">Speak directly with our team</p>
                            <a href="tel:+94112345678" class="btn btn-primary rounded-pill px-4">
                                <i class="bi bi-telephone me-2"></i> Call Now
                            </a>
                            <div class="mt-2">
                                <p class="small mb-1">Main: +94 11 234 5678</p>
                                <p class="small mb-1">Mobile: +94 77 123 4567</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Email -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center p-4">
                            <div class="icon-box bg-danger text-white rounded-circle mx-auto mb-3">
                                <i class="bi bi-envelope-fill fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Email</h5>
                            <p class="mb-3">Send us your inquiries</p>
                            <a href="mailto:info@rajapaksha.com" class="btn btn-danger rounded-pill px-4">
                                <i class="bi bi-envelope me-2"></i> Email Us
                            </a>
                            <div class="mt-2">
                                <p class="small mb-1">General: info@rajapaksha.com</p>
                                <p class="small mb-1">Support: support@rajapaksha.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visit Our Store -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold primery-color mb-4">Visit Our Store</h2>
                    <div class="d-flex mb-3">
                        <i class="bi bi-geo-alt-fill text-primary fs-4 me-3"></i>
                        <div>
                            <h5 class="fw-bold">Our Location</h5>
                            <p>No 132/A, Kandy Road ,kobbewala Junction ,Galigamuwa Town <br>Sri Lanka</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-clock-fill text-primary fs-4 me-3"></i>
                        <div>
                            <h5 class="fw-bold">Opening Hours</h5>
                            <p class="mb-1">Monday - Friday: 8:00 AM - 8:30 PM</p>
                            <p class="mb-1">Saturday: 8:00 AM - 8:30 PM</p>
                            <p class="mb-1">Sunday: 9:00 AM - 8:30 PM</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="bi bi-info-circle-fill text-primary fs-4 me-3"></i>
                        <div>
                            <h5 class="fw-bold">Parking Information</h5>
                            <p>Free parking available in front of the store and at the rear parking lot.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-0">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15833.541526048278!2d80.3022282538117!3d7.237264947459764!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTQnMTQuMiJOIDgwwrAxOCcwOC4wIkU!5e0!3m2!1sen!2slk!4v1713349500000!5m2!1sen!2slk" 
                                width="100%" 
                                height="400" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <!-- Include SweetAlert2 in your main layout (like app.blade.php) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="fw-bold primery-color text-center mb-4">Send Us a Message</h2>
                        <form action="{{ route('send.inquiry') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-12">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                        <label class="form-check-label" for="newsletter">
                                            Subscribe to our newsletter
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">
                                        <i class="bi bi-send-fill me-2"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Success Popup -->
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Social Media -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center">
                <h2 class="fw-bold primery-color mb-4">Connect With Us</h2>
                <p class="lead mb-4">Follow us on social media for updates and promotions</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#" class="social-icon facebook">
                        <i class="bi bi-facebook fs-4"></i>
                    </a>
                    <a href="#" class="social-icon instagram">
                        <i class="bi bi-instagram fs-4"></i>
                    </a>
                    <a href="#" class="social-icon twitter">
                        <i class="bi bi-twitter-x fs-4"></i>
                    </a>
                    <a href="#" class="social-icon youtube">
                        <i class="bi bi-youtube fs-4"></i>
                    </a>
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
    
    .hover-effect {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hover-effect:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .social-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: transform 0.3s ease;
    }
    
    .social-icon:hover {
        transform: scale(1.1);
    }
    
    .facebook { background-color: #3b5998; }
    .instagram { background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d); }
    .twitter { background-color: #000000; }
    .youtube { background-color: #ff0000; }
    
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
    // Form submission handling
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Here you would typically send the form data to your server
        // For demonstration, we'll just show an alert
        alert('Thank you for your message! We will get back to you soon.');
        this.reset();
    });
</script>
@endsection