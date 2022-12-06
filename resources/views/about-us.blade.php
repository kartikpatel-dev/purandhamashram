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
                        <h3>{{ __('Puran Dham Ghuneshwar') }}</h3>
                    </div>
                </div>

                <div class="col-md-8">
                    <p>Puran Dham is the ashram of <b>Alaksh Avtari Pujya Sat Hariram Bapa</b> in the village of Ghuneshwar,
                        previously known as Ghunda.</p>
                    <p>A rural village, Pujya Sat Hariram Bapa would visit the ancestral family home from time to time. He
                        would be accompanied by family members and sometimes by disciples. The magnetism of Pujya Sat
                        Hariram Bapa's words was such, that progressively, spontaneous discourses to a small group outside
                        in the front yard of the humble farmhouse of his uncle became larger and larger as more and more got
                        attracted to His Santvani. Villagers from the nearby villages looked forward to Pujya Bapa's visits
                        and would gather in large numbers to hear His Satsang whenever Pujya Bapa paid a visit.</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/about-us-banner.jpg') }}" class="img-fluid" alt="About Us">
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-12">
                    <h4>History</h4>
                    <p>Word spread from person to person of Pujya Bapa's Teachings and over the decades that followed,
                        people came from far and wide, and the small group of disciples grew as time passed. His fame spread
                        further and people with yearning for True Knowledge came from outside of India for Darshan and to
                        hear words of Sat Gnan from Pujya Bapa. A visit to Kenya and the UK came in 1973 and Pujya Bapa's
                        teachings spread to an international community and the diaspora of shishyas that spans across the
                        globe now. </p>
                    <p>The foundation was laid from what was a plot of barren land to a prayer hall and a few rooms. Over a
                        period, it was transformed into the Ashram it is today, accommodating hundreds of disciples. Pujya
                        Bapa wished for His shishyas to be comfortable in their spiritual home of Puram Dham. He oversaw the
                        developments Himself, carefully reviewing the architecture & design to suit the needs for Satsang
                        Sabhas and balanced by comfort for those who visited.</p>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-12">
                    <h4>Teachings</h4>
                    <p>Pujya Hariram Bapa taught that every individual can achieve Godhead as God lives in every human being equally. He engendered spiritual awareness in individuals through His discourse - Knowledge of one's self through introspection, regular prayers, meditation and Satsang and service of humanity. His Teaching were universal, treating all human beings as equals without cast, creed, or other bias.</p>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-12">
                    <h4>Work</h4>
                    <p>He established a Hospital as there was no medical facility in the area at the time. The village had no school, so a school was built for the education of the village children. He established Boarding facilities for students who went to educate themselves further. He established charitable activities for the under privileged communities, including the visually impaired and disabled as well as those afflicted with serious illnesses. </p>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-12">
                    <h4>Mission</h4>
                    <p>To spread the knowledge of spiritual enlightenment of own Atma through Pujya Hariram Bapa's Teachings and to establish operate and maintain Charitable Projects.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
