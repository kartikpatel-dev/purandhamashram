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
        <div class="d-none d-md-flex align-items-center">
            <div class="social-links">
                <a href="https://www.facebook.com/" class="facebook" target="_blank">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="https://www.youtube.com/" class="youtube" target="_blank">
                    <i class="bi bi-youtube"></i>
                </a>
            </div>

            @guest
                <a href="#" class="person-circle" title="Login">
                    <i class="bi bi-person-circle"></i>
                </a>
            @else
                <div class="dropdown-topbar">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('home') }}">
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest
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
                    <a class="nav-link scrollto {{ Route::currentRouteName() == 'front.home' ? 'active' : '' }}"
                        href="{{ route('front.home') }}">Home</a>
                </li>
                <li>
                    <a class="nav-link scrollto {{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}"
                        href="{{ route('about-us') }}">About Us</a>
                </li>
                <li>
                    <a class="nav-link scrollto {{ Route::currentRouteName() == 'gallery' ? 'active' : '' }}"
                        href="{{ route('gallery') }}">Gallery</a>
                </li>
                <li><a class="nav-link scrollto" href="https://www.youtube.com/" target="_blank">Video</a></li>
                <li>
                    <a class="nav-link scrollto {{ Route::currentRouteName() == 'contact-us' ? 'active' : '' }}"
                        href="{{ route('contact-us') }}">Contact Us</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
