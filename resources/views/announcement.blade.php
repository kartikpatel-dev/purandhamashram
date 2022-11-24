@extends('layouts.app')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Announcement</h2>
                <ol>
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li>Announcement</li>
                </ol>
            </div>
        </div>
    </section>

    <section id="announcement" class="announcement">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>Announcement</h3>
                    </div>

                    <div class="accordion accordion-flush" id="accordionAnnouncement">
                        @forelse($RS_Results as $RS_Row)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="item-heading{{ $loop->index }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#item-collapse{{ $loop->index }}" aria-expanded="false"
                                        aria-controls="item-collapse{{ $loop->index }}">
                                        <span class="announcement-title">{{ $RS_Row->title }}</span>
                                        <span class="announcement-date">{{ $RS_Row->created_at }}</span>
                                    </button>
                                </h2>
                                <div id="item-collapse{{ $loop->index }}" class="accordion-collapse collapse"
                                    aria-labelledby="item-heading{{ $loop->index }}"
                                    data-bs-parent="#accordionAnnouncement">
                                    <div class="accordion-body">
                                        {!! $RS_Row->description !!}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No data found.</p>
                        @endforelse

                        @if (count($RS_Results) > 0)
                            <div class="main-pagination">
                                {!! $RS_Results->links('pagination::bootstrap-4') !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
