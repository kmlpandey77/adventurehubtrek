@extends('layouts.app')

@section('title')
{{ $destination->m_title }}@endsection

@section('meta')
<meta name="description" content="{{ $destination->m_description }}" >
<meta name="keywords" content="{{ $destination->m_keyword }}" >
<meta property="og:description"   content="{{ $destination->m_description }}" />
@endsection

@section('content')

<section class="breadcum-wrap">
    <div class="container">
        {!! new Breadcrumb($destination) !!}
    </div>
</section>

<div class="clearfix"></div>


<section class="content gray-bg {{ $destination->slug }}">
  <div class="container">

    <h1>{{ $destination->title }}</h1>
    <div class="content-left mb-5">
        {!! $destination->details !!}
    </div>


    @if (count($destination->activities)>0)

    <div class="card-list">
        <h3 class="mb-4">{{ $destination->title }} Activities</h3>
        <div class="content-left">


            <div class="row">

            	@foreach ($destination->activities as $category)

            	@include('category-card')

            	@endforeach

            </div>
        </div>

    @endif
  </div>
</section>
@endsection
