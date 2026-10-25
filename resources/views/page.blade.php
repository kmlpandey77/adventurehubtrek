@extends('layouts.app')

@section('title')
{{ $page->m_title }}@endsection

@section('meta')
<meta name="description" content="{{ $page->m_description }}" >
<meta name="keywords" content="{{ $page->m_keyword }}" >
<meta property="og:description"   content="{{ $page->m_description }}" />
@endsection

@section('content')
<section class="breadcum-wrap">
    <div class="container">
        {!! new Breadcrumb($page) !!}
    </div>
</section>

<section class="content gray-bg">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="content-left {{ $page->slug }}">
          <h1>{{ $page->title }}</h1>

          {!! $page->details !!}

        </div>
      </div>
      <div class="col-sm-4">

        <div class="content-right">

        	@if (isset($parent) && $parent)
						<div class="right-menu">
            	<h3>{{ $parent->title }}</h3>
							<ul>
								@foreach ($sidebar as $menu)
								<li><a href="{{ url($menu->slug) }}">{{ $menu->title }}</a></li>
								@endforeach
							</ul>
						</div>
					@endif

        </div>

      </div>
    </div>
  </div>
</section>
@endsection
