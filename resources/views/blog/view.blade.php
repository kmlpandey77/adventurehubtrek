@extends('layouts.app')

@section('title')
{{ $blog->m_title }}@endsection

@section('meta')
<meta name="description" content="{{ $blog->m_description }}" >
<meta name="keywords" content="{{ $blog->m_keyword }}" >
@endsection



@section('content')

<section class="content gray-bg">
  <div class="container">
  	{!! new Breadcrumb($blog, 'blog') !!}

    <div class="row">
      <div class="col-md-8">
        <div class="content-left">
          <h1>{{ $blog->title }}</h1>

          <p class="date-user">
						<span><i class="fa fa-clock-o"></i> {{ $blog->f_date }}</span>
						<span><i class="fa fa-user"></i> {{ config('app.name') }}</span>
					</p>
					<div class="sharethis-inline-share-buttons"></div>
					<br>
					@if ($blog->image)
					<p><img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid"></p>
					@endif

          {!! $blog->details !!}

        </div>
      </div>
      <div class="col-md-4">

        <div class="content-right">

        	<h3>Travel Blog</h3>
					<ul class="other-blogs">
						@foreach ($other_blogs as $b)
						<li>
							<a href="{{ $b->url }}">

								<div class="image">

									<img src="{{ $b->image('100x80') }}" alt="{{ $b->title }}">
								</div>

								<div class="text">

									<span class="date">{{ $b->f_date }}</span>	
									<h4 class="title">{{ $b->title}}</h4>
								</div>
							</a>
						</li>
						@endforeach
					</ul>	
          
        </div>            

      </div>
    </div>
  </div>
</section>
@endsection
