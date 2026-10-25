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

		<h1>{{ $page->title }}</h1>

		<div class="legaldocs">
			<div class="grid" id="lightgallery">
				@foreach ($legaldocs as $legaldoc)			
				<a class="col-sm-3 grid-item" href="{{ asset('uploads/legaldocs/' . $legaldoc->image) }}" title="{{ $legaldoc->name }}">
					<img src="{{ asset('uploads/legaldocs/' . $legaldoc->image) }}" alt="{{ $legaldoc->name }}" class="img-responsive img-thumbnail">
				</a>			
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')

<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>

<script>
	$(document).ready(function() {
		lightGallery(document.getElementById('lightgallery'),{
			download:false,
			zoom: true,
		});
		$('.grid').masonry({
			itemSelector: '.grid-item',
			percentPosition: true
		});
	});
</script>

@endsection
