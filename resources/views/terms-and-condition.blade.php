@extends('layouts.app')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Terms and Condition</h2>
                <ol>
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li>Terms and Condition</li>
                </ol>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>{{ __('Terms and Condition') }}</h3>
                    </div>
                </div>

                <div class="col-md-12">
                    <h4>Coming Soon</h4>
                </div>
            </div>
        </div>
    </section>
@endsection
