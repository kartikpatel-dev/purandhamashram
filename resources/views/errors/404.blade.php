@extends('layouts.app')

@section('title', __('Not Found'))

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>@yield('title')</h2>
                <ol>
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li>@yield('title')</li>
                </ol>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <h2>{{ __('404 | Not Found') }}</h2>
                </div>
            </div>
        </div>
    </section>
@endsection
