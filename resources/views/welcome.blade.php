@extends('layouts.app')

@section('content')
    <section id="home-slider-section" class="home-slider-section py-0">
        <div class="home-slider swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="home-slider-wrap">
                        <div class="home-slider-item">
                            <img src="{{ asset('images/home-slide-1.jpg') }}" class="d-block w-100" alt="Slide 1">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-slider-wrap">
                        <div class="home-slider-item">
                            <img src="{{ asset('images/home-slide-2.jpg') }}" class="d-block w-100" alt="Slide 2">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-slider-wrap">
                        <div class="home-slider-item">
                            <img src="{{ asset('images/home-slide-3.jpg') }}" class="d-block w-100" alt="Slide 3">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="home-slider-wrap">
                        <div class="home-slider-item">
                            <img src="{{ asset('images/home-slide-4.jpg') }}" class="d-block w-100" alt="Slide 4">
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
                        <p><b>Lorem Ipsum is simply dummy</b> text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It
                            was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.</p>
                        <p><b>- Lorem Ipsum</b></p>
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
                            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
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
                            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
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
                            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
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
