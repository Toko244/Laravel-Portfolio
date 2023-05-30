@php
    $blog = App\Models\Blog::latest()->paginate(3);
@endphp
<section class="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">06 - Blog</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="mt-5">
            <div class="row gx-0 justify-content-center">
                @foreach ($blog as $item)
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="{{ route('blog.details', $item->id) }}"><img src="{{ asset($item->image) }}" alt=""></a>
                            <div class="blog__post__tags">
                                <a href="{{ route('blogs.by.category', $item->id) }}">{{ $item['category']['name'] }}</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                            <h3 class="title"><a href="{{ route('blog.details', $item->id) }}">{{ $item->title }}</a></h3>
                            <a href="{{ route('blog.details', $item->id) }}" class="read__more">Read mORe</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="blog__button text-center">
            <a href="{{ route('home.blog') }}" class="btn">more blog</a>
        </div>
    </div>
</section>
