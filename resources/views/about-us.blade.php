@extends('layouts.app')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>About Us</h2>
                <ol>
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li>About Us</li>
                </ol>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>{{ config('app.name', 'Laravel') }}</h3>
                    </div>
                </div>

                <div class="col-md-8">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                        publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem ipsum dolor sit
                        amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Duis aute irure dolor in reprehenderit</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Duis aute irure dolor in reprehenderit</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/about-us-banner.jpg') }}" class="img-fluid" alt="About Us">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="fst-italic">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <ul>
                        <li>Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </li>
                        <li>Duis aute irure dolor in reprehenderit in voluptate
                            velit.</li>
                        <li>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                    </ul>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-12">
                    <h3>What is Lorem Ipsum?</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                        publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like
                        readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                        default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                        infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                        (injected humour and the like).</p>
                    <ul>
                        <li>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                        <li>Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </li>
                        <li>Duis aute irure dolor in reprehenderit in voluptate
                            velit.</li>
                        <li>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
