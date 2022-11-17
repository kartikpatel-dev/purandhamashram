<section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <a href="mailto:info@purandhamashram.com" class="text-white d-flex group-link-underline">
                <i class="bi bi-envelope d-flex align-items-center"></i>
                <span class="link-underline ms-2">info@purandhamashram.com</span>
            </a>
            <a href="tel:9876543210" class="text-white d-flex group-link-underline">
                <i class="bi bi-phone d-flex align-items-center ms-4"></i>
                <span class="link-underline ms-2">+91 98765 43210</span>
            </a>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <a href="https://www.facebook.com/" class="facebook" target="_blank">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://www.youtube.com/" class="youtube" target="_blank">
                <i class="bi bi-youtube"></i>
            </a>
            <a href="#" class="person-circle" title="Login / Register">
                <i class="bi bi-person-circle"></i>
            </a>
        </div>
    </div>
</section> <!-- End Top Bar -->

<header id="header" class="header d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1 class="text-light"><a href="{{ route('front.home') }}">{{ config('app.name', 'Laravel') }}</a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a href="{{ route('front.home') }}"
                        class="nav-link scrollto {{ Route::currentRouteName() == 'front.home' ? 'active' : '' }}">Home</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="#">About Us</a>
                </li>
                <li><a class="nav-link scrollto" href="#">Gallery</a></li>
                <li><a class="nav-link scrollto" href="#">Video</a></li>
                <li><a class="nav-link scrollto" href="#">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
