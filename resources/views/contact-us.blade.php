@extends('layouts.app')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Contact Us</h2>
                <ol>
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li>Contact Us</li>
                </ol>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="info">
                        <a>
                            <div class="address info-item d-flex align-items-center justify-content-center">
                                <i class="bi bi-geo-alt"></i>
                                <p>Puran Dham Ashram, Ghunda, Jam Jodhpur, Jamnagar</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="info">
                        <a href="tel:9876543210">
                            <div class="phone info-item d-flex align-items-center justify-content-center">
                                <i class="bi bi-phone"></i>
                                <p>+91 98765 43210</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="info">
                        <a href="mailto:info@purandhamashram.com">
                            <div class="email info-item d-flex align-items-center justify-content-center">
                                <i class="bi bi-envelope"></i>
                                <p>info@purandhamashram.com</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="other-contact" class="contact other-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
                    <div class="info">
                        <a href="tel:9876543210">
                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Name here</h4>
                                <p>+91 98765 43210</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
                    <div class="info">
                        <a href="tel:9876543210">
                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Name here</h4>
                                <p>+91 98765 43210</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
                    <div class="info">
                        <a href="tel:9876543210">
                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Name here</h4>
                                <p>+91 98765 43210</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
                    <div class="info">
                        <a href="tel:9876543210">
                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Name here</h4>
                                <p>+91 98765 43210</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="map" class="map py-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d118340.3890664601!2d69.9416534!3d22.0443482!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3957a128eec7eb13%3A0xb22ca0c2123ae273!2sPuran%20Dham%2C%20Ghuneshwar%2C%20Gujarat%20360515!5e0!3m2!1sen!2sin!4v1669116326368!5m2!1sen!2sin"
            allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection
