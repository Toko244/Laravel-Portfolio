@extends('frontend.frontend_master')

@section('main')

    <!-- banner-area -->
    @include('frontend.components.banner')
    <!-- banner-area-end -->
    <!-- about-area -->
    @include('frontend.components.about')
    <!-- about-area-end -->

    <!-- services-area -->
    @include('frontend.components.services')
    <!-- services-area-end -->

    <!-- work-process-area -->
    @include('frontend.components.working_process')
    <!-- work-process-area-end -->

    <!-- portfolio-area -->
    @include('frontend.components.portfolio')
    <!-- portfolio-area-end -->

    <!-- partner-area -->
    @include('frontend.components.partners')
    <!-- partner-area-end -->

    <!-- blog-area -->
    @include('frontend.components.blog')
    <!-- blog-area-end -->

    <!-- contact-area -->
    @include('frontend.components.contact_me')
    <!-- contact-area-end -->


@endsection
