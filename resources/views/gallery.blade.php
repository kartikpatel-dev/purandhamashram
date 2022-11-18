@extends('layouts.app')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Gallery</h2>
                <ol>
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li>Gallery</li>
                </ol>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>Gallery</h3>
                    </div>
                    <div class="photo-gallery">
                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-8.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-8.jpg') }}" class="" alt="Gallery 8">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-2.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-2.jpg') }}" class="" alt="Gallery 2">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-3.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-3.jpg') }}" class="" alt="Gallery 3">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-4.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-4.jpg') }}" class="" alt="Gallery 4">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-3.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-3.jpg') }}" class="" alt="Gallery 5">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-6.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-6.jpg') }}" class="" alt="Gallery 6">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-1.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-1.jpg') }}" class="" alt="Gallery 7">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-8.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-8.jpg') }}" class="" alt="Gallery 8">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-9.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-9.jpg') }}" class="" alt="Gallery 9">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-10.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-10.jpg') }}" class="" alt="Gallery 10">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-4.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-4.jpg') }}" class="" alt="Gallery 11">
                            </a>
                        </div>

                        <div class="pg-item">
                            <a href="{{ asset('images/gallery-1.jpg') }}" class="glightbox">
                                <img src="{{ asset('images/gallery-1.jpg') }}" class="" alt="Gallery 1">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
