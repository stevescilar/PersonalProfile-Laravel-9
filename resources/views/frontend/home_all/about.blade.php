{{-- so as to fetch data from our Model, we bring in the Model responsible --}}
@php

    $aboutPage = App\Models\About::find(1);
    $images = App\Models\MultiImage::all();

@endphp
<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach ( $images as $image)
                        
                    <li>
                        <img class="light" src="{{ asset($image->multi_img) }}" alt="XD">
                    </li>

                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{ $aboutPage->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img class="rounded-circle" src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $aboutPage->short_title }} <br> </p>
                        </div>
                    </div>
                    <p class="desc">

                        {!! $aboutPage->desc !!}
                    
                    </p>
                    <a href="{{ route('aboutfull.page') }}" class="btn">See Detailed info!</a>
                </div>
            </div>
        </div>
    </div>
</section>