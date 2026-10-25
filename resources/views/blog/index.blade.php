@extends('layouts.app')

@section('title')
{{ $page->m_title }}@endsection

@section('meta')
<meta name="description" content="{{ $page->m_description }}" >
<meta name="keywords" content="{{ $page->m_keyword }}" >
@endsection

@section('content')

<section class="content gray-bg travel-blog">
  <div class="container">
    {!! new Breadcrumb($page) !!}

    <div class="content-left">
      <h1>{{ $page->title }}</h1>
      <hr>
      <div class="row">
        @if ($blogs)
        @foreach ($blogs as $key=>$blog)
        @include('blog.card')
        @endforeach
        {{$blogs->links()}}
        @else
        <p>No record found!!</p>
        @endif

      </div>
    </div>
  </div>
</section>
@endsection
