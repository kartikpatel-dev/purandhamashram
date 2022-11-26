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
                        @forelse($RS_Results as $RS_Row)
                            <div class="pg-item">
                                <a href="{{ env('APP_URL') . Storage::url('app/public/' . $RS_Row->file_path) }}" class="glightbox">
                                    <img src="{{ env('APP_URL') . Storage::url('app/public/' . $RS_Row->file_path) }}" class=""
                                        alt="{{ $RS_Row->file_name }}">
                                </a>
                            </div>
                        @empty
                            <p>No data found.</p>
                        @endforelse
                    </div>

                    @if (count($RS_Results) > 0)
                        <div class="main-pagination">
                            {!! $RS_Results->links('pagination::bootstrap-4') !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
