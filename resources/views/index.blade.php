@extends('layouts.app')
@section('title') {{ $page->m_title }}
@endsection

@section('meta')
<meta name="description" content="{{ $page->m_description }}">
<meta name="keywords" content="{{ $page->m_keyword }}">
@endsection

@section('content')
<section class="homeslide">

    <div class="owl-carousel owl-theme" id="homeslide">
        @foreach ($slides as $key=>$slide)
        <div class="item">
            <img src="{{ $slide->image() }}" alt="{{ $slide->title }}" title="{{ $slide->title }}">
            <div class="caption">
                <h4 class="col-md-10 col-lg-8 m-auto">{{ $slide->title }}</h4>
            </div>
        </div>
        @endforeach
    </div>

</section>

<section class="welcome">
    <div class="container">
        <h1>Travel With <span>Adventure Hub Trek</span></h1>
        <div class="welcome-txt" id="welcome-text">
            <div class="txt">
                {!! $page->details !!}
            </div>
            <a href="#" class="welcome-view-more">View More</a>
        </div>
    </div>

</section>

<section class="popular-destinations gray-bg">
    <div class="container">
        <h2 class="mb-4">Most Popular Trekking Region</h2>
        <div class="row">
            @foreach ($regions as $region)
            <div class="col-sm-4">
                <div class="popular-dest">
                    <a href="{{ $region->url }}"><img src="{{ $region->image() }}" alt="{{ $region->title }}" class="img-fluid"></a>
                    <h3><a href="{{ $region->url }}">{{ $region->title }}</a></h3>
                    <p>{{ str_limit(strip_tags($region->details), 80) }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<section class="feature-trip py-5">
    <div class="container">
        <h2 class="mb-4">Feature adventure packages</h2>
        <div class="row">
            @foreach($feature_treks as $package)
            @include('package-card')
            @endforeach
        </div>
    </div>
</section>

<section class="feature-trip gray-bg py-5">
    <div class="container">
        <h2 class="mb-4">Feature Tour packages</h2>
        <div class="row">
            @foreach($feature_tours as $package)
            @include('package-card')
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        owl = $("#homeslide").owlCarousel({
            loop:true,
            nav:false,
            items:1,
            dots: true,
            autoplay:true,
            addClassActive: true,
        });
        owl.on('changed.owl.carousel', function(event) {
            var item = event.item.index - 2;     // Position of the current item
            $('.caption').removeClass('animated slideInUp');
            $('.owl-item').not('.cloned').eq(item).find('.caption').addClass('animated slideInUp');
        });

        $(document).on('click', 'a.welcome-view-more',function(e){
            e.preventDefault();
            $('#welcome-text').find('.txt').toggleClass('expand', 1000);
            $(this).text(function(i, text){
                return text === "View More" ? "View Less" : "View More";
            })
        });
    });

</script>
@endsection