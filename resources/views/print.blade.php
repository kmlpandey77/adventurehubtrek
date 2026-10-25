<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{{ $package->title }}</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
	<link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
	<link href="{{ asset('vendors/print.css') }}" rel="stylesheet" media="print">
	<link href="{{ asset('stylesheets/print.css') }}" rel="stylesheet">

</head>

<body class="A4">
	<a href="#" class="print_btn">Print</a> {{-- <a href="javascript: history.back()" class="back_btn">Back</a> --}}
	<section class="sheet padding-10mm">
		<div class="logo">
			<img src="{{ asset('images/logo.png') }}" alt="" width="312" height="65" />
		</div>

		<div class="overview">
			<h1 class="title">{{ $package->title }}</h1>

			<div class="facts">
				<h3>Trip Facts</h3>
				<p>
					<b>Price:</b> USD {{ $package->price }}</p>
				<p>
					<b>Duration:</b> {{ $package->duration }} days</p>
				@foreach ($package->facts as $fact)
				<p>
					<b>{{ $fact->title }}:</b> {{ $fact->value }}</p>
				@endforeach
			</div>

			{!! $package->details !!}

		</div>

		<div class="itinerary">
			<h2 class="sub_title">Day to Day Itinerary </h2>
			@foreach ($package->itineraries as $itinerary)
			<p>
				<strong>{{ $itinerary->day }}:{{ $itinerary->outline }}</strong>
				<br />{!! $itinerary->details !!}
			</p>
			@endforeach
		</div>

		@if($package->map)
		<div class="map">
			<h2 class="sub_title">Route Map</h2>
			<img src="{{ asset('uploads/maps/'.$package->map) }}" alt="{{ $package->title }} map" title="{{ $package->title }} map" class="img-fluid">
		</div>
		@endif

		<div class="includes">
			<h2 class="sub_title">Trip Cost Includes</h2>
			{!! $package->include !!}
		</div>

		<div class="excludes">
			<h2 class="sub_title">Trip Cost Excludes</h2>{!! $package->exclude !!}
		</div>

		<div class="excludes">
			{!! $package->trip_details !!}
		</div>

		<div class="footer">
			{!! $contact !!}
		</div>
		</div>

	</section>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
		$(function () {
			total_wd = $(document).width();
			sheet_wd = $('.sheet').outerWidth();
			btn_wd = $('.print_btn').outerWidth();
			right_pos = ((total_wd - sheet_wd) / 2) - btn_wd;
			$('.print_btn').css('right', right_pos);
			$(".print_btn").click(function () {
				$('.print_btn').hide();
				window.print();
				$('.print_btn').show();
			});
		});
	</script>
</body>

</html>