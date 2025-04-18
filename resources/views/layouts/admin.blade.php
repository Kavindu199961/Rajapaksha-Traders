<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    
    <!-- CSS Links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    
    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>


<!-- Sidebar Navigation -->
<div class="navigation">
    <ul>
         <li>
            <a href="#">
                <img src="{{ asset('img/logo2.png') }}" alt="Rajapaksha Treders" class="logo" style="width: 280px; height: 100px; margin-top: 20px;">
            </a>
        </li>

        <li>
                    <a href="/">
                        <span class="icon">
                            <ion-icon name="globe-outline"></ion-icon> 
                        </span>
                        <span class="title">Goto Website</span>
                    </a>
                </li>


        <li class="{{ Request::routeIs('category.index') ? 'hovered' : '' }}">
            <a href="{{ route('category.index') }}" class="category-link">
                <span class="icon">
                    <ion-icon name="albums-outline"></ion-icon> <!-- Category Icon -->
                </span>
                <span class="title">Category</span>
            </a>
        </li>

        <li class="{{ Request::routeIs('ads.index') ? 'hovered' : '' }}">
            <a href="{{ route('ads.index') }}" class="ads-link">
                <span class="icon">
                    <ion-icon name="images-outline"></ion-icon> <!-- Ads Icon -->
                </span>
                <span class="title">Ads</span>
            </a>
        </li>

        <li class="{{ Request::routeIs('items.index') ? 'hovered' : '' }}">
            <a href="{{ route('items.index') }}" class="items-link">
                <span class="icon">
                    <ion-icon name="cube-outline"></ion-icon> <!-- Item Icon -->
                </span>
                <span class="title">Items</span>
            </a>
        </li>

        <li class="{{ Request::routeIs('story.index') ? 'hovered' : '' }}">
            <a href="{{ route('story.index') }}" class="story-link">
                <span class="icon">
                    <ion-icon name="book-outline"></ion-icon> <!-- Story Icon -->
                </span>
                <span class="title">Story</span>
            </a>
        </li>

        <li class="{{ Request::routeIs('transport.index') ? 'hovered' : '' }}">
            <a href="{{ route('transport.index') }}" class="transport-link">
                <span class="icon">
                    <ion-icon name="bus-outline"></ion-icon> <!-- Transport Icon -->
                </span>
                <span class="title">Transport</span>
            </a>
        </li>


        <li>
            <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="title">Sign Out</span>
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
        </li>
        
    </ul>
</div>

<!-- Main Content -->
<div class="main">
    <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
    </div>

    <main>

        <div class="container-fluid bg-light p-3 text-center">
            <h1 class="text-primary">Admin Panel</h1>
            <p class="lead">Welcome to the Admin Panel</p>
        <div class="container mt-4">
            @yield('content')

            @yield('styles')

            @yield('scripts')
        </div>
    </main>
    <footer class="text-center mt-4 p-3">
        <small>Powered by <strong>CeylonGIT</strong></small>
    </footer>
</div>

<!-- JavaScript for Toggle Menu -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
   
    // Menu Toggle Script
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");

    toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };
</script>

<!-- IonIcons Script -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>
