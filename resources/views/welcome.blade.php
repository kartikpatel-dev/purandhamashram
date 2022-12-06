@extends('layouts.app')

@section('content')
    <section id="home-slider-section" class="home-slider-section py-0">
        <div class="home-slider swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="home-slider-wrap">
                        <div class="home-slider-item">
                            <img src="{{ asset('images/home-slide-1.png') }}" class="d-block w-100" alt="Slide 1">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-slider-wrap">
                        <div class="home-slider-item">
                            <img src="{{ asset('images/home-slide-2.png') }}" class="d-block w-100" alt="Slide 2">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-slider-wrap">
                        <div class="home-slider-item">
                            <img src="{{ asset('images/home-slide-3.png') }}" class="d-block w-100" alt="Slide 3">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-slider-wrap">
                        <div class="home-slider-item">
                            <img src="{{ asset('images/home-slide-4.png') }}" class="d-block w-100" alt="Slide 4">
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <section id="about-section" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-title">
                        <h2>About Us</h2>
                    </div>
                    <div class="section-content">
                        <p>Puran Dham is the ashram of <b>Alaksh Avtari Pujya Sat Hariram Bapa</b> in the village of Ghuneshwar, previously known as Ghunda. </p>
                        <p>A rural village, Pujya Sat Hariram Bapa would visit the ancestral family home from time to time. He would be accompanied by family members and sometimes by disciples. The magnetism of Pujya Sat Hariram Bapa's words was such, that progressively, spontaneous discourses to a small group outside in the front yard of the humble farmhouse of his uncle became larger and larger as more and more got attracted to His Santvani. Villagers from the nearby villages looked forward to Pujya Bapa's visits and would gather in large numbers to hear His Satsang whenever Pujya Bapa paid a visit.</p>
                        <p><b>- Sat Hariram Bapa</b></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="section-title">
                        <h2>Announcement</h2>
                    </div>
                    @if (!empty($RS_Results))
                        <div class="announcement-list">
                            <a @auth href="{{ route('announcement') }}" @endauth>
                                <div class="announcement-scroll">
                                    @forelse($RS_Results as $RS_Row)
                                        <div class="announcement-item">
                                            <span class="announcement-title">{{ $RS_Row->title }}</span>
                                            <span class="announcement-date">{{ $RS_Row->created_at }}</span>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="home-box-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="home-box-main">
                        <div class="box-icon"><i class="bi bi-cpu"></i></div>
                        <div class="box-title">
                            <a class="box-title-link" href="{{ route('about-us') }}">About Us</a>
                        </div>
                        <div class="box-content">
                            <p>Puran Dham is the ashram of Alaksh Avtari Pujya Sat Hariram Bapa in the village of Ghuneshwar</p>
                        </div>
                        <div class="box-btn">
                            <a class="box-btn-link" href="{{ route('about-us') }}">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="home-box-main">
                        <div class="box-icon"><i class="bi bi-camera"></i></div>
                        <div class="box-title">
                            <a class="box-title-link" href="{{ route('gallery') }}">Gallery</a>
                        </div>
                        <div class="box-content">
                            <p>View our Satsang photos</p>
                        </div>
                        <div class="box-btn">
                            <a class="box-btn-link" href="{{ route('gallery') }}">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="home-box-main">
                        <div class="box-icon"><i class="bi bi-chat-dots"></i></div>
                        <div class="box-title">
                            <a class="box-title-link" href="{{ route('contact-us') }}">Contact Us</a>
                        </div>
                        <div class="box-content">
                            <p>Get in touch with the Puran Dham Ashram</p>
                        </div>
                        <div class="box-btn">
                            <a class="box-btn-link" href="{{ route('contact-us') }}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
