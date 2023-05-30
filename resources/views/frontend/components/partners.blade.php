@php
    $partner = App\Models\Partner::find(1);
    $image = App\Models\PartnerMultiImages::all();
@endphp
<section class="partner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="partner__logo__wrap">
                    @foreach ($image as $item)
                    <li>
                        <img class="light" src="{{ asset($item->images) }}" alt="">
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="partner__content">
                    <div class="section__title">
                        <span class="sub-title">05 - partners</span>
                        <h2 class="title">{{ $partner->title }}</h2>
                    </div>
                    <p>{{ $partner->about_for_partners }}</p>
                    <a href="{{ route('contact.index') }}" class="btn">Start a conversation</a>
                </div>
            </div>
        </div>
    </div>
</section>
