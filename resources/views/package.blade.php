@extends('layouts.app', ['inquiry_page' => $package->title])
@section('title') {{ $package->m_title }}
@endsection

@section('meta')
<meta name="description" content="{{ $package->m_description }}">
<meta name="keywords" content="{{ $package->m_keyword }}">
<meta property="og:description" content="{{ $package->m_description }}" />
@endsection

@section('content')

<section class="breadcum-wrap">
    <div class="container">
        {!! new Breadcrumb($package) !!}
    </div>
</section>

<section class="content gray-bg trip">
    <div class="container" itemscope itemtype="http://schema.org/Product">

        <div class="package-title">
            <h1 itemprop="name">{{ $package->title }} </h1>
        </div>

        <div class="trip-wrap">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trip-left">
                        <!-- tab section here -->
                        <div class="tab-block">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
                                </li>
                                @if($package->itineraries()->count())
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#itinerary">Itinerary</a>
                                </li>
                                @endif
                                @if($package->include || $package->exclude)
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#costdetails">Cost Details</a>
                                </li>
                                @endif
                                @if($package->trip_details)
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#note">Note</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="overview" class="container tab-pane active"><br>
                                <section class="innerslide" style="min-height: 100px">
                                    <div class="owl-carousel" id="innerslide">
                                        @foreach ($package->slides as $key => $slide)
                                        <div class="item">
                                            <img src="{{ $slide->image() }}" alt="{{ $slide->title }}" title="{{ $slide->title }}">
                                            <p>{{ $slide->title }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                </section>

                                <div class="price-box d-block d-lg-none">
                                    @if ($package->price)
                                    <p>Trip Price</p>

                                    <div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <span itemprop="priceCurrency">USD</span>
                                        <span itemprop="price">{{ $package->f_price }}</span>
                                        <small>per person</small>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button class="button button-plain button-pill" data-toggle="modal" data-target="#inquiryModal">Make an Inquiry</button>                                    @else
                                    <p>
                                        Price On Request
                                        <a href="{{ url('contact-us') }}" class="button button-plain button-pill">Contact us</a>
                                    </p>
                                    @endif
                                </div>

                                @if($package->days() || $package->facts()->count())
                                <div class="trip-facts d-block d-lg-none mb-0">
                                    <ul itemprop="additionalProperty" itemscope itemtype="http://schema.org/PropertyValue">
                                        <li class="media">
                                            <div class="icon mr-3">
                                                <i class="fa fa-clock-o fa-fw"></i>
                                            </div>
                                            <div class="media-body">
                                                <span itemprop="name" class="title">Duration:</span>
                                                <span itemprop="value" class="value">{{ $package->days() }}</span>
                                            </div>
                                        </li>

                                        @if ($package->grade)
                                        <li class="media">
                                            <div class="icon mr-3">
                                                <i class="fa fa-signal fa-fw"></i>
                                            </div>
                                            <div class="media-body">
                                                <span itemprop="name" class="title">Trip Grade:</span>
                                                <span itemprop="value" class="value">
                                                {{ config('grade.title.' . $package->grade) }}
                                                <a href="#!" data-toggle="popover" data-trigger="hover" data-content="{{ $package->grade_content }}"
                                                    data-placement="top">
                                                    <i class="fa fa-info-circle"></i>
                                                </a>
                                            </span>
                                            </div>
                                        </li>
                                        @endif @foreach ($package->facts as $fact)
                                        <li class="media">
                                            <div class="icon mr-3">
                                                <i class="fa fa-{{ $fact->icon() }} fa-fw"></i>
                                            </div>
                                            <div class="media-body">
                                                <span itemprop="name" class="title">{{ $fact->title }}:</span>
                                                <span itemprop="value" class="value">{{ $fact->value }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <section class="overview" id="overview">

                                    @if ($package->highlight)
                                    <div class="hightlight">
                                        {!! $package->highlight !!}
                                    </div>
                                    @endif

                                    <div itemprop="description">
                                        {!! $package->details !!}
                                    </div>

                                </section>

                                @if($package->map && file_exists(public_path('uploads/maps/'.$package->map)))
                                <div class="trip_map d-block d-lg-none">
                                    <a href="#" data-toggle="modal" data-target="#mapModal">
                                    <img src="{{ asset('uploads/maps/'.$package->map) }}" alt="{{ $package->title }} map" title="{{ $package->title }} map" class="img-fluid">
                                    <span><i class="fa fa-search-plus"></i> Click to enlarge</span>
                                </a>
                                </div>
                                @endif
                            </div>
                            <div id="itinerary" class="container tab-pane fade">
                                @if($package->itineraries()->count())

                                <div class="itineraries" id="itineraries">
                                    <h2>Trip Itinerary</h2>

                                    @foreach ($package->itineraries as $key=>$itinerary)
                                    <div class="itinerary">
                                        <h4><span class="bold">{{$itinerary->day}} :</span> {{$itinerary->outline}}</h4>
                                        {!!$itinerary->details!!}
                                    </div>
                                    @endforeach @if ($package->itinerary_note)
                                    <div class="alert alert-info" role="alert">
                                        {!! $package->itinerary_note !!}
                                    </div>
                                    @endif

                                </div>
                                @endif

                            </div>

                            <div id="cost-details" class="container tab-pane fade">
                                @if($package->include)
                                <div class="trip-page-box inclusion" id="inclusion">
                                    <h2>Inclusion</h2>
                                    {!! $package->include !!}
                                </div>
                                @endif @if($package->exclude)
                                <div class="trip-page-box exclusion" id="exclusion">
                                    <h2>Exclusion</h2>
                                    {!! $package->exclude !!}
                                </div>
                                @endif
                            </div>
                            <div id="note" class="container tab-pane fade">
                                @if($package->trip_details)
                                <div class="trip-page-box trip_details" id="trip_details">
                                    {!! $package->trip_details !!}
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="trip-right">

                        <div class="price-box d-none d-lg-block">
                            @if ($package->price)
                            <h4>Trip Price</h4>
                            <div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="priceCurrency">USD <i class="fa fa-usd" aria-hidden="true"></i></span>
                                <span itemprop="price">{{ $package->f_price }} <small>per person</small></span>

                            </div>
                            @else
                            <p>Price On Request</p>
                            <a href="{{ url('contact-us') }}" class="button button-plain button-pill button-small">Contact us</a>                            @endif
                        </div>

                        @if($package->days() || $package->facts()->count())
                        <div class="trip-facts d-none d-lg-block">
                            <ul itemprop="additionalProperty" itemscope itemtype="http://schema.org/PropertyValue">
                                <li>
                                    <span itemprop="name" class="title">Duration:</span>
                                    <span itemprop="value" class="value">{{ $package->days() }}</span>
                                </li>
                                @if ($package->grade)
                                <li>
                                    <span itemprop="name" class="title">Trip Grade:</span>
                                    <span itemprop="value" class="value">{{ config('grade.title.' . $package->grade) }}</span>
                                </li>
                                @endif @foreach ($package->facts as $fact)
                                <li>
                                    <span itemprop="name" class="title">{{ $fact->title }}:</span>
                                    <span itemprop="value" class="value">{{ $fact->value }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif @if($package->map && file_exists(public_path('uploads/maps/'.$package->map)))
                        <div class="trip_map d-none d-lg-block">
                            <a href="#" data-toggle="modal" data-target="#mapModal">
                            <img src="{{ asset('uploads/maps/'.$package->map) }}" alt="{{ $package->title }} map" title="{{ $package->title }} map" class="img-fluid">
                            <span><i class="fa fa-search-plus"></i> Click to enlarge</span>
                        </a>
                        </div>
                        @endif

                        <div class="content-right">

                            <div class="right-menu">
                                <h3>Before Booking a Trip</h3>
                                <ul>
                                    @foreach ($infos as $info)
                                    <li>
                                        <a href="{{ $info->url }}">{{ $info->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="trip-f00ter-nav">

            <a target="_blank" href="{{ route('pdf', [$package->slug, '_ref']) }}" class="button button-primary button-uppercase button-pill button-small button-border "><span class="fa fa-fw fa-file-pdf-o"></span> Download PDF</a>

            <a href="#" class="button button-primary button-uppercase button-pill button-small button-border" data-toggle="modal" data-target="#customizeModal"><span class="fa fa-fw fa-sliders"></span> Customize this trip</a>

            <a href="{{ route('booking', $package->slug) }}" class="button button-primary button-uppercase button-pill button-small button-border "><span class="fa fa-fw fa-ticket"></span> Book This Trip</a>

        </div>
    </div>
</section>
@endsection

@section('script')

<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="mapModalLabel">{{ $package->title }} Map</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <p>
                    <img src="{{ asset('uploads/maps/'.$package->map) }}" alt="{{ $package->title }} map" title="{{ $package->title }} map" class="img-fluid">
                </p>
                @if($package->f_graphs)
                <div class="d-none d-sm-block">
                    <hr>
                    <canvas id="attitudeChart"></canvas>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade tinyModal" id="customizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('customize') }}" method="post" class="needs-validation" novalidate>
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customize Your Trip</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="package" name="package" value="{{ isset($package) ? $package->title : null  }}">
                        <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby="emailHelp" placeholder="Full Name"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required="">
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" class="form-control" id="phone" name="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="country" id="country" required="">
                          <option value="">-- Select Contry --</option>
                          @foreach (App\Country::all() as $country)
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" class="form-control" id="number_of_traveller" name="number_of_traveller" placeholder="Number of Traveller">
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="Message" required=""></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 offset-sm-1">
                            <button type="submit" class="button button-primary button-raised button-rounded button-block">Send</button>
                        </div>
                        <div class="col-sm-5">
                            <button type="button" class="button button-secondary button-raised button-rounded button-block" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        // $('#tellafriendModal').modal('show');
        $("#innerslide").owlCarousel({
            loop: true,
            nav:true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ],
            items: 1,
            dots: false,
            autoplay: true,
        });

        var tl = $(".trip-left").outerHeight();
        var tr = $(".trip-right").outerHeight();
        if(tl>tr){
            $(".trip-right").css('min-height', tl);
        }


    });

</script>
@endsection