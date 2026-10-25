@extends('layouts.app')

@section('title')
{{ $news->meta_title() }}@endsection

@section('meta')
<meta name="description" content="{{ $news->meta_description() }}" >
<meta name="keywords" content="{{ $news->meta_keyword() }}" >
@endsection

@section('content')

<div class="inner-page white-bg">
	<div class="container">
		{!! new Breadcrumb($news, 'news') !!}
		<div class="row">
			<div class="col-sm-8">
				<h1>{{ $news->title }}</h1>

				<p class="date-user">
					<span><i class="fa fa-clock-o"></i> {{ $news->date() }}</span>
					<span><i class="fa fa-user"></i> Great Nepal Treks</span>
				</p>
				<div class="sharethis-inline-share-buttons"></div>
				<br>
				@if ($news->image)
				<p><img src="{{ asset('uploads/news/' . $news->image) }}" alt="{{ $news->title }}" class="img-responsive"></p>
				@endif

				{!! $news->details !!}
			</div>

			<div class="col-sm-4">
				<div class="right-box">
					<h3>Travel News</h3>
					<ul class="travel-blog">
						@foreach ($other_news as $b)
						<li>
							<a href="{{ url('news/'.$b->slug) }}">

								<div class="image">

									<img src="{{ $b->thumb() }}" alt="{{ $b->title }}">
								</div>

								<div class="text">

									<span class="date">{{ $b->event_date() }}</span>	
									<h4 class="title">{{ $b->title}}</h4>
								</div>
							</a>
						</li>
						@endforeach
					</ul>					
				</div>
				<div class="right-box">
					<div class="tripadvisor">
						<div id="TA_selfserveprop364" class="TA_selfserveprop">
							<ul id="TVXN4dbf" class="TA_links wG7mFrGhBn">
								<li id="ugdTFYgaopcW" class="ptLmPB1Z1To">
									<a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
								</li>
							</ul>
						</div>
						<script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=364&amp;locationId=10897806&amp;lang=en_US&amp;rating=true&amp;nreviews=3&amp;writereviewlink=true&amp;popIdx=false&amp;iswide=false&amp;border=true&amp;display_version=2"></script>

					</div>					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
