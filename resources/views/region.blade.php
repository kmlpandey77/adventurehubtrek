@extends('layouts.app') 
@section('title') {{ $region->m_title }}
@endsection
 
@section('meta')
<meta name="description" content="{{ $region->m_description }}">
<meta name="keywords" content="{{ $region->m_keyword }}">
<meta property="og:description" content="{{ $region->m_description }}" />
@endsection
 
@section('content')

<section class="content gray-bg {{ $region->slug }}">
    <div class="container">

        {!! new Breadcrumb($region) !!}

        <div class="row">
            <div class="col-sm-12">
                <div class="content-left">

                    <h1>{{ $region->title }}</h1>

                    {!! $region->details !!}                     

                </div>

                @if ($region->packages)

                <div class="card-list">

                    <h3>Packages</h3>

                    <div class="row">

                        @foreach ($region->packages as $package)
                        @include('package-card')
                        @endforeach

                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
 
@section('script')
<script>
    $(document).ready(function(){
        $("#innerslide").owlCarousel({
          loop:true,
          nav:false,
          items:1,
          dots: false,
          autoplay:true,
        });
    });

</script>
@endsection