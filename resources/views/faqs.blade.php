@extends('layouts.app')

@section('title')
{{ $page->meta_title() }}@endsection

@section('meta')
<meta name="description" content="{{ $page->meta_description() }}" >
<meta name="keywords" content="{{ $page->meta_keyword() }}" >
@endsection

@section('content')

<div class="inner-page white-bg">
	<div class="container">
		
		{!! new Breadcrumb($page) !!}

		<div class="row">
			<div class="col-sm-8">
				<div class="page-overview {{ $page->slug }}">
					<h1>{{ $page->title }}</h1>

					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

						@if (count($faqs) > 1)
						@foreach ($faqs as $key => $faq)
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{ $key }}" aria-expanded="true" aria-controls="collapse_{{ $key }}">
										{{ $faq['question'] }}
									</a>
								</h4>
							</div>
							<div id="collapse_{{ $key }}" class="panel-collapse collapse {{ $key==1 ? 'in' : null }}" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									{!! $faq['answer'] !!}
								</div>
							</div>
						</div>
						@endforeach
						@endif

					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="right-box">
					<h3>Travel Blog</h3>
					<ul class="travel-blog">
						@foreach ($blogs as $blog)
						<li>
							<a href="{{ url('blog/'.$blog->slug) }}">

								<div class="image">

									<img src="{{ $blog->thumb() }}" alt="{{ $blog->title }}">
								</div>

								<div class="text">

									<span class="date">{{ $blog->event_date() }}</span>	
									<h4 class="title">{{ $blog->title}}</h4>
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
