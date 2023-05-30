@extends('frontend.frontend_master')

@section('main')

<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">All Portfolios</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
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


    <!-- blog-area -->
    <section class="standard__blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach ($portfolio as $item)
                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="{{ route('portfolio.details', $item->id) }}"><img src="{{ asset($item->image) }}" alt=""></a>
                            <a href="{{ route('portfolio.details', $item->id) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                        <div class="standard__blog__content">
                            <p>{!! Str::limit( $item->description, 300) !!}</p>
                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <aside class="services__sidebar">
                        <h4 class="widget-title">Recent Blog</h4>
                            <ul class="rc__post">
                                @foreach ($allBlogs as $blog)
                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="{{ route('blog.details', $blog->id) }}"><img src="{{ asset($blog->image) }}" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a></h5>
                                        <span class="post-date"><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        <div class="widget mt-5">
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
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="datatable-buttons_info" role="status"
                        aria-live="polite"></div>
                </div>
                <div class="pagination-wrap">
                    {{ $portfolio->links('vendor.pagination.frontendCustom') }}
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->


    <!-- contact-area -->
    <div style="margin-top: 200px">
        @include('frontend.components.contact_me')
    </div>
    <!-- contact-area-end -->

</main>

@endsection
