@extends('layouts.app')

@section('title')
{{ $page->m_title }}@endsection

@section('meta')
<meta name="description" content="{{ $page->m_description }}" >
<meta name="keywords" content="{{ $page->m_keyword }}" >
@endsection

@section('content')

<section class="content gray-bg">
  <div class="container">
  	{!! new Breadcrumb($page) !!}

  	<div class="content-left inner-review">
      <h1>{{ $page->title }}</h1>

      @foreach ($reviews as $review)
      <div class="media">
				@if ($review->image)
				<img class="align-self-start mr-4" src="{{ $review->thumb() }}" alt="{{ $review->name }}"  width="200">
				@else
				<img class="align-self-start mr-4" src="{{ asset('images/default/user.jpg') }}" alt="{{ $review->name }}"  width="200">
				@endif
		  
		  <div class="media-body">
		    <h5 class="mt-0">{{ $review->title }}</h5>
		    <p class="rating">
		    	@for ($i = 0; $i < $review->rating; $i++)
		    		<i class="fa fa-star active"></i>
					@endfor
					@for ($k = ($i-1); $k < 4; $k++)
		    		<i class="fa fa-star deactive"></i>
		    	@endfor
		    </p>
		    {!! $review->details !!}
		    <p class="name">By <i>{{ $review->name }}, <b>{{ $review->country->name }}</b></i></p>
		  </div>
		</div>
		<hr>
    @endforeach

    </div>
  </div>
</section>
@endsection
