@extends('layouts.web')

@section('title', 'Our Story - Rajapaksha Traders')

@section('content')
<div class="story-page">
    <!-- Hero Section -->
    <section class="hero-section py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('img/story.jpg') }}') no-repeat center center; background-size: cover;">
        <div class="container text-white text-center py-5">
            <h1 class="display-4 font-weight-bold mb-3 text-white">Our Story</h1>
            <p class="lead">The journey of Rajapaksha Traders</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5 bg-light">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <aside class="col-lg-3 mb-4">
                <div class="story-sidebar p-4 bg-white shadow-sm rounded">
                    <h5 class="mb-3 text-primary">Our Journey</h5>
                    <ul class="list-unstyled story-nav">
                        @foreach($stories as $story)
                        <li class="mb-2 position-relative">
                            <a href="#story-{{ $story->id }}" class="d-flex align-items-center story-nav-link">
                                <span class="story-dot"></span>
                                <span class="story-title">{{ $story->title }}</span>
                                <span class="story-date">{{ $story->created_at->format('M Y') }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="progress-container mt-4">
                        <div class="progress-bar" id="reading-progress"></div>
                    </div>
                </div>
            </aside>

            <!-- Story Timeline -->
            <div class="col-lg-9">
                @if($stories && $stories->count() > 0)
                    @foreach($stories->sortByDesc('created_at') as $index => $story)
                    <div class="story-card mb-5" id="story-{{ $story->id }}" data-aos="fade-up">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                @if($story->image)
                                <div class="story-image-wrapper">
                                    <img src="{{ asset('storage/'.$story->image) }}" alt="{{ $story->title }}" class="img-fluid rounded shadow">
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="story-content p-4">
                                    <h2 class="mb-3">{{ $story->title }}</h2>
                                    <div class="story-text">{!! $story->content !!}</div>
                                    <div class="story-meta mt-3 text-muted">
                                        <i class="far fa-calendar-alt mr-1"></i> {{ $story->created_at->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($story->galleries->count() > 0)
                        <div class="story-gallery mt-4">
                            <h5 class="text-center mb-3">Gallery</h5>
                            <div class="row">
                                @foreach($story->galleries as $gallery)
                                <div class="col-md-4 mb-3">
                                    <img 
                                        src="{{ asset('storage/'.$gallery->image_path) }}" 
                                        class="img-fluid rounded shadow-sm previewable-image" 
                                        data-src="{{ asset('storage/'.$gallery->image_path) }}" 
                                        data-title="{{ $story->title }} - Gallery Image" 
                                        alt="Gallery Image" 
                                        style="cursor: pointer;">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    @if(!$loop->last)
                    <div class="story-divider my-5">
                        <div class="divider-line"></div>
                        <div class="divider-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                    </div>
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

<!-- JS for Preview Modal -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.previewable-image').forEach(function (img) {
            img.addEventListener('click', function () {
                const src = this.getAttribute('data-src');
                const title = this.getAttribute('data-title');
                document.getElementById('modalImage').src = src;
                document.getElementById('imageModalLabel').textContent = title;
                const modal = new bootstrap.Modal(document.getElementById('imageModal'));
                modal.show();
            });
        });
    });
</script>

</div>

@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
    .story-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        position: relative;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .story-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .story-image-wrapper img {
        height: 300px;
        object-fit: cover;
        width: 100%;
        border-radius: 12px;
        transition: transform 0.5s ease;
    }

    .story-image-wrapper:hover img {
        transform: scale(1.02);
    }

    .story-content h2 {
        font-weight: 600;
        color: #2c3e50;
        position: relative;
        padding-bottom: 10px;
    }

    .story-content h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: #3498db;
    }

    .story-text {
        color: #555;
        line-height: 1.8;
    }

    .story-gallery img {
        height: 180px;
        object-fit: cover;
        width: 100%;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .sllery img:hover {
        transform: scale(1.03);
    }

    /* Story Sidebar */
    .story-sidebar {
        position: sticky;
        top: 100px;
        height: calc(100vh - 120px);
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #3498db #f1f1f1;
    }

    .story-sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .story-sidebar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .story-sidebar::-webkit-scrollbar-thumb {
        background-color: #3498db;
        border-radius: 6px;
    }

    .story-nav-link {
        padding: 8px 12px;
        color: #555;
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.3s ease;
        position: relative;
    }

    .story-nav-link:hover {
        background: #f8f9fa;
        color: #3498db;
        transform: translateX(5px);
    }

    .story-nav-link.active {
        background: #e3f2fd;
        color: #3498db;
        font-weight: 500;
    }

    .story-nav-link.active .story-dot {
        background: #3498db;
        transform: scale(1.2);
    }

    .story-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        background: #95a5a6;
        border-radius: 50%;
        margin-right: 12px;
        transition: all 0.3s ease;
    }

    .story-title {
        flex-grow: 1;
    }

    .story-date {
        font-size: 0.8rem;
        color: #95a5a6;
        margin-left: 10px;
    }

    /* Progress bar */
    .progress-container {
        width: 100%;
        height: 4px;
        background: #ecf0f1;
        border-radius: 2px;
        margin-top: 20px;
    }

    .progress-bar {
        height: 4px;
        background: #3498db;
        width: 0%;
        border-radius: 2px;
        transition: width 0.1s ease;
    }

    /* Story divider */
    .story-divider {
        position: relative;
        height: 60px;
    }

    .divider-line {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, #3498db, transparent);
    }

    .divider-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        background: #fff;
        border: 2px solid #3498db;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #3498db;
    }

    @media (max-width: 992px) {
        .story-sidebar {
            position: static;
            height: auto;
            margin-bottom: 30px;
        }
        
        .story-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .story-nav li {
            flex: 1 0 calc(50% - 10px);
        }
        
        .story-date {
            display: none;
        }
    }
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({ duration: 800, once: true });
        
        // Smooth scroll and active link highlighting
        const storySections = document.querySelectorAll('.story-card');
        const navLinks = document.querySelectorAll('.story-nav-link');
        const sidebar = document.querySelector('.story-sidebar');
        
        // Update active link based on scroll position
        function updateActiveLink() {
            let fromTop = window.scrollY + 150;
            
            storySections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                
                if (fromTop >= sectionTop && fromTop < sectionTop + sectionHeight) {
                    const id = section.getAttribute('id');
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${id}`) {
                            link.classList.add('active');
                            
                            // Scroll sidebar to show active link
                            const sidebarRect = sidebar.getBoundingClientRect();
                            const linkRect = link.getBoundingClientRect();
                            
                            if (linkRect.bottom > sidebarRect.bottom || linkRect.top < sidebarRect.top) {
                                link.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            }
                        }
                    });
                }
            });
        }
        
        // Smooth scroll for navigation links
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetSection = document.querySelector(targetId);
                
                if (targetSection) {
                    window.scrollTo({
                        top: targetSection.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Update active class
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });
        
        // Reading progress indicator
        function updateProgressBar() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('reading-progress').style.width = scrolled + '%';
            
            updateActiveLink();
        }
        
        window.addEventListener('scroll', updateProgressBar);
        window.addEventListener('resize', updateProgressBar);
        
        // Initialize
        updateProgressBar();
    });



</script>
@endsection