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
            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d8361.153420436123!2d69.94410046183516!3d22.06201013057865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1ssathariram%2C%20Ghunda%2C%20JamJodhpur%2C%20Jamnagar!5e0!3m2!1sen!2sin!4v1668775847060!5m2!1sen!2sin"
            allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection
