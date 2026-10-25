@extends('layouts.app')

@section('title')
Search Result
@endsection


@section('content')



<section class="content gray-bg">
	<div class="container">
		
		<div class="content-left">
			
			<h1>Search Result</h1>
			<div class="card-list">      

			@if (count($packages) > 0)
			<div class="row">
				@foreach ($packages as $package)
				@php
				$package = \App\Package::find($package->id);
				@endphp
				@include('package-card')
				@endforeach			
			</div>

			<hr>
			{{ $packages->appends(request()->all())->links('pagination::bootstrap-4') }}
			@else
			<p>Your search did not match any documents.</p>
			@endif
			</div>
			
			
		</div>

	</div>
</section>

@endsection


