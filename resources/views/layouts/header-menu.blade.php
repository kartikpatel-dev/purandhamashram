<section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-sm-between">
        <div class="contact-info d-flex align-items-center">
            <a href="mailto:info@purandhamashram.com" class="text-white d-flex group-link-underline">
                <i class="bi bi-envelope d-flex align-items-center"></i>
                <span class="link-underline ms-2">{{ __('info@purandhamashram.com') }}</span>
            </a>
            <a href="tel:9876543210" class="text-white d-flex group-link-underline">
                <i class="bi bi-phone d-flex align-items-center ms-4"></i>
                <span class="link-underline ms-2">{{ __('+91 98765 43210') }}</span>
            </a>
        </div>
        <div class="d-flex align-items-center">
            <div class="social-links">
                <a href="https://www.facebook.com/" class="facebook" target="_blank">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="https://www.youtube.com/" class="youtube" target="_blank">
                    <i class="bi bi-youtube"></i>
                </a>
            </div>

            @guest
                <a href="{{ route('login') }}" class="person-circle" title="Login">
                    <i class="bi bi-person-circle"></i>
                </a>
            @else
                <div class="dropdown-topbar">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle1 person-circle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if (!empty(Auth::user()->avatar))
                            <img src="{{ env('APP_URL') . Storage::url('app/public/' . Auth::user()->avatar) }}"
                                alt="{{ Auth::user()->first_name }}" class="avatar-person-circle" />
                        @else
                            <i class="bi bi-person-circle"></i>
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item bg-light">{{ Auth::user()->first_name }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                {{ __('Profile') }}
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
                        href="{{ route('front.home') }}">{{ __('Home') }}</a>
                </li>
                @auth
                    <li>
                        <a class="nav-link scrollto {{ Route::currentRouteName() == 'announcement' ? 'active' : '' }}"
                            href="{{ route('announcement') }}">{{ __('Announcement') }}</a>
                    </li>
                @endauth
                <li>
                    <a class="nav-link scrollto {{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}"
                        href="{{ route('about-us') }}">{{ __('About Us') }}</a>
                </li>
                <li>
                    <a class="nav-link scrollto {{ Route::currentRouteName() == 'gallery' ? 'active' : '' }}"
                        href="{{ route('gallery') }}">{{ __('Gallery') }}</a>
                </li>
                <li><a class="nav-link scrollto" href="https://www.youtube.com/" target="_blank">{{ __('Video') }}</a></li>
                <li>
                    <a class="nav-link scrollto {{ Route::currentRouteName() == 'contact-us' ? 'active' : '' }}"
                        href="{{ route('contact-us') }}">{{ __('Contact Us') }}</a>
                </li>
                @auth
                    <li class="ashram-visitor">
                        <a class="nav-link scrollto {{ Route::currentRouteName() == 'Ashram.Visitor' ? 'active' : '' }}"
                            href="{{ route('Ashram.Visitor') }}">{{ !empty(Auth::user()->visitor_status) ? __('Check Out') : __('Check In') }}</a>
                    </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
