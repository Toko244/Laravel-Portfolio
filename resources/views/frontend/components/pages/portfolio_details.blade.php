@extends('frontend.frontend_master')

@section('main')

<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">{{ $portfolio->title }} Details</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                <li><img src=" {{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
                <li><img src=" {{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
                <li><img src=" {{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
                <li><img src=" {{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
                <li><img src=" {{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
                <li><img src=" {{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- portfolio-details-area -->
    <section class="services__details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="services__details__thumb">
                        <img src="{{ asset($portfolio->image) }}" alt="">
                    </div>
                    <div class="services__details__content">
                        <p>{!! $portfolio->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="services__sidebar">
                        <div class="widget">
                            <h5 class="title">Get in Touch</h5>
                            <form action="{{ route('contact.store') }}" method="POST" class="sidebar__contact">
                                @csrf
                                <input type="text" name="name" placeholder="Enter name*">
                                <input type="email" name="email" placeholder="Enter your mail*">
                                <textarea name="message" name="message" id="message" placeholder="Massage*"></textarea>
                                <button type="submit" class="btn">send massage</button>
                            </form>
                        </div>
                        <div class="widget">
                            <h5 class="title">Contact Information</h5>
                            <ul class="sidebar__contact__info">
                                <li><span>Country :</span>{{ $contactInfo->country }}</li>
                                <li><span>Address :</span>{{ $contactInfo->address }}</li>
                                <li><span>Mail :</span>{{ $contactInfo->email }}</li>
                                <li><span>Phone :</span>{{ $contactInfo->number }}</li>
                            </ul>
                            <ul class="sidebar__contact__social">
                                <li><a href="{{ $contactInfo->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="{{ $contactInfo->facebook }}"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="{{ $contactInfo->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{ $contactInfo->twitter }}"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio-details-area-end -->


    <!-- contact-area -->
    <div style="margin-top: 200px">
        @include('frontend.components.contact_me')
    </div>
    <!-- contact-area-end -->

</main>

@endsection
