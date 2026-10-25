@extends('layouts.app')
@section('title') {{ $activity->m_title }}
@endsection

@section('meta')
<meta name="description" content="{{ $activity->m_description }}">
<meta name="keywords" content="{{ $activity->meta_keyword }}">
<meta property="og:description"   content="{{ $activity->m_description }}" />
@endsection

@section('content')

<section class="breadcum-wrap">
    <div class="container">
        {!! new Breadcrumb($activity) !!}
    </div>
</section>

<section class="content gray-bg {{ $activity->slug }}">
    <div class="container">

        <h1>{{ $activity->title }}</h1>
        <div class="content-left mb-5">
            <div class="content_wrap">
                {!! $activity->details !!}
            </div>
        </div>

        @if ($activity->regions)

        <div class="card-list">

            <h3 class="mb-4">Regions</h3>
            <div class="content-left mb-5">
                <div class="row">

                    @foreach ($activity->regions as $category)
                    @include('category-card')
                    @endforeach

                </div>
            </div>
        </div>
        @endif

        @if ($activity->packages)

        <div class="card-list">

            <h3>Package</h3>

            <div class="row">

                @foreach ($activity->packages as $package)
                @include('package-card')
                @endforeach

            </div>
        </div>
        @endif

    </div>
</section>
@endsection