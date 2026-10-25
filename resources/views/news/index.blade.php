@extends('layouts.app')

@section('title')
News || {{ config('app.company') }}
@endsection

@section('meta')
<meta name="description" content="News" >
<meta name="keywords" content="News" >
@endsection

@section('content')

<div class="inner-page white-bg">
    <div class="container">

        {{-- {!! new Breadcrumb($region) !!} --}}
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>News</li>
        </ol>

        <h1>News</h1>
        
        <hr>        
        @if ($news)
        @foreach ($news as $n)
        @include('news.card_new')
        @endforeach
        {{$news->links()}}
        @else
        <p>No record found!!</p>
        @endif
    </div>
</div>

@endsection
