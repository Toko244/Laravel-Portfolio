@php
    $service = App\Models\Service::latest()->get();
@endphp
<section class="services">
    <div class="container">
        <div class="services__title__wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section__title">
                        <span class="sub-title">02 - my Services</span>
                        <h2 class="title">Creates amazing digital experiences</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="services__arrow"></div>
                </div>
            </div>
        </div>
        <div class="row gx-0 services__active">
            @foreach ($service as $item)
            <div class="col-xl-3">
                <div class="services__item">
                    <div class="services__thumb">
                        <a href="{{ route('service.details', $item->id) }}"><img src="{{ asset($item->image) }}" alt=""></a>
                    </div>
                    <div class="services__content">
                        <div class="services__icon">
                            <img class="light" src="{{ asset('frontend/assets/img/icons/services_light_icon01.png') }}" alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon01.png') }}" alt="">
                        </div>
                        <h3 class="title"><a href="services-details.html">{{ $item->title }}</a></h3>
                        <p>{{ $item->short_description }}</p>

                        <a href="{{ route('service.details', $item->id) }}" style="margin: 30px" class="btn border-btn">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
