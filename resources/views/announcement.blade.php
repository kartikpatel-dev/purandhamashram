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
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="item-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#item-collapseOne" aria-expanded="false"
                                    aria-controls="item-collapseOne">
                                    <span class="announcement-title">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry</span>
                                    <span class="announcement-date">17 November 2022</span>
                                </button>
                            </h2>
                            <div id="item-collapseOne" class="accordion-collapse collapse" aria-labelledby="item-headingOne"
                                data-bs-parent="#accordionAnnouncement">
                                <div class="accordion-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                        the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                        with desktop publishing software like Aldus PageMaker including versions of Lorem
                                        Ipsum.</p>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                        it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                        here, content here', making it look like readable English. Many desktop publishing
                                        packages and web page editors now use Lorem Ipsum as their default model text, and a
                                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                                        versions have evolved over the years, sometimes</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="item-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#item-collapseTwo" aria-expanded="false"
                                    aria-controls="item-collapseTwo">
                                    <span class="announcement-title">It is a long established fact that a reader will be
                                        distracted by the readable</span>
                                    <span class="announcement-date">20 November 2022</span>
                                </button>
                            </h2>
                            <div id="item-collapseTwo" class="accordion-collapse collapse" aria-labelledby="item-headingTwo"
                                data-bs-parent="#accordionAnnouncement">
                                <div class="accordion-body">
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                        it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                        here, content here', making it look like readable English. Many desktop publishing
                                        packages and web page editors now use Lorem Ipsum as their default model text, and a
                                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                                        versions have evolved over the years, sometimes</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="item-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#item-collapseThree" aria-expanded="false"
                                    aria-controls="item-collapseThree">
                                    <span class="announcement-title">Placeholder content for this accordion, which is
                                        intended to
                                        demonstrate the Lorem Aldus PageMaker includingply dummy</span>
                                    <span class="announcement-date">08 December 2022</span>
                                </button>
                            </h2>
                            <div id="item-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="item-headingThree" data-bs-parent="#accordionAnnouncement">
                                <div class="accordion-body">
                                    <p>Placeholder content for this accordion, which is intended to
                                        demonstrate the <code>.accordion-flush</code> class. This is the third item's
                                        accordion
                                        body. Nothing more exciting happening here in terms of content, but just filling up
                                        the
                                        space to make it look, at least at first glance, a bit more representative of how
                                        this
                                        would look in a real-world application.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="item-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#item-collapseFour" aria-expanded="false"
                                    aria-controls="item-collapseFour">
                                    <span class="announcement-title">Lorem Ipsum is simply dummy</span>
                                    <span class="announcement-date">14 December 2022</span>
                                </button>
                            </h2>
                            <div id="item-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="item-headingFour" data-bs-parent="#accordionAnnouncement">
                                <div class="accordion-body">
                                    <p>Placeholder content for this accordion, which is intended to
                                        would look in a real-world application.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="item-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#item-collapseFive" aria-expanded="false"
                                    aria-controls="item-collapseFive">
                                    <span class="announcement-title">printer took a gal</span>
                                    <span class="announcement-date">18 December 2022</span>
                                </button>
                            </h2>
                            <div id="item-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="item-headingFive" data-bs-parent="#accordionAnnouncement">
                                <div class="accordion-body">
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                        it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                        here, content here', making it look like readable English. Many desktop publishing
                                        packages and web page editors now use Lorem Ipsum as their default model text, and a
                                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                                        versions have evolved over the years, sometimes</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="item-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#item-collapseSix" aria-expanded="false"
                                    aria-controls="item-collapseSix">
                                    <span class="announcement-title">Lorem Ipsum is dummy</span>
                                    <span class="announcement-date">25 December 2022</span>
                                </button>
                            </h2>
                            <div id="item-collapseSix" class="accordion-collapse collapse"
                                aria-labelledby="item-headingSix" data-bs-parent="#accordionAnnouncement">
                                <div class="accordion-body">
                                    <p>Placeholder content for this accordion, which is intended to
                                        demonstrate the <code>.accordion-flush</code> class. This is the third item's
                                        accordion
                                        body. Nothing more exciting happening here in terms of content, but just filling up
                                        the
                                        space to make it look, at least at first glance, a bit more representative of how
                                        this
                                        would look in a real-world application.</p>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                        it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                        here, content here', making it look like readable English. Many desktop publishing
                                        packages and web page editors now use Lorem Ipsum as their default model text, and a
                                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                                        versions have evolved over the years, sometimes</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="item-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#item-collapseSeven" aria-expanded="false"
                                    aria-controls="item-collapseSeven">
                                    <span class="announcement-title">printer took a gal is simply</span>
                                    <span class="announcement-date">27 December 2022</span>
                                </button>
                            </h2>
                            <div id="item-collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="item-headingSeven" data-bs-parent="#accordionAnnouncement">
                                <div class="accordion-body">
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                        it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                        here, content here', making it look like readable English. Many desktop publishing
                                        packages and web page editors now use Lorem Ipsum as their default model text, and a
                                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                                        versions have evolved over the years, sometimes</p>
                                    <p>Placeholder content for this accordion, which is intended to
                                        demonstrate the <code>.accordion-flush</code> class. This is the third item's
                                        accordion
                                        body. Nothing more exciting happening here in terms of content, but just filling up
                                        the
                                        space to make it look, at least at first glance, a bit more representative of how
                                        this
                                        would look in a real-world application.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
