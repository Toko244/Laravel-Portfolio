@extends('frontend.frontend_master')

@section('main')
        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">{{ $service->title }}</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Service Details</li>
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


            <!-- blog-details-area -->
            <section class="standard__blog blog__details">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="standard__blog__post">
                                <div class="standard__blog__thumb">
                                    <img src="{{ asset($service->image) }}" alt="">
                                </div>
                                <div class="blog__details__content services__details__content">
                                    <ul class="blog__post__meta">
                                        <li><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($service->created_at)->diffForHumans() }}</li>
                                    </ul>
                                    <p>{!! $service->description !!}</p>
                                    <div class="services__details__img">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="assets/img/blog/blog_details_img01.jpg" alt="">
                                            </div>
                                            <div class="col-sm-6">
                                                <img src="assets/img/blog/blog_details_img02.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <aside class="blog__sidebar">
                                <div class="widget">
                                    <h4 class="widget-title">Recent Services</h4>
                                    <ul class="rc__post">
                                        @foreach ($services as $item)
                                        <li class="rc__post__item">
                                            <div class="rc__post__thumb">
                                                <a href="{{ route('service.details', $item->id) }}"><img src="{{ asset($item->image) }}" alt=""></a>
                                            </div>
                                            <div class="rc__post__content">
                                                <h5 class="title"><a href="{{ route('service.details', $item->id) }}">{{ $item->title }}</a></h5>
                                                <span class="post-date"><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- blog-details-area-end -->


            <!-- contact-area -->
            <div style="margin-top: 200px">
                @include('frontend.components.contact_me')
            </div>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

@endsection
