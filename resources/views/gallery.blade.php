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
                        @forelse($galleries as $gallery)
                            <div class="pg-item">
                                <a href="{{ asset('images/' . $gallery->file_path) }}" class="glightbox">
                                    <img src="{{ asset('images/' . $gallery->file_path) }}" class=""
                                        alt="{{ $gallery->file_name }}">
                                </a>
                            </div>
                        @empty
                            <p>No data found.</p>
                        @endforelse
                    </div>

                    <div class="pg-pagination">
                        {!! $galleries->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
