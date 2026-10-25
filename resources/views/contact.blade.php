@extends('layouts.app')
@section('title') {{ $page->m_title }}
@endsection

@section('meta')
<meta name="description" content="{{ $page->m_description }}">
<meta name="keywords" content="{{ $page->m_keyword }}">
@endsection

@section('content')

<section class="content gray-bg">
	<div class="container">
		{!! new Breadcrumb($page) !!}

		<div class="row">

			<div class="col-sm-6">
				<div class="content-left {{ $page->slug }}">
					<h1>{{ $page->title }}</h1>
					<form method="post" action="{{ route('contact') }}">

						{!! csrf_field() !!}
						<div class="form-group">
							<label for="name">
								Name</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required="required" />
						</div>
						<div class="form-group">
							<label for="email">
								Email Address</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="required" />
						</div>

						<div class="form-group">
							<label for="phone">
								Phone</label>
							<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" />
						</div>

						<div class="form-group">
							<label for="name">
								Message</label>
							<textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
						</div>

						<button type="submit" class="btn btn-primary btn-flat">
							Send Message
						</button>


					</form>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="content-left {{ $page->slug }}">

					<h4>{{ config('app.name') }}</h4>
					<p>
                        <i class="fa fa-map-marker"></i> {{ label('global:address') }} <br>
                        <i class="fa fa-phone"></i> {{ label('global:ph_number') }} <br>
                        <i class="fa fa-whatsapp"></i> {{ label('global:whatsapp_number') }} <br>
                        <i class="fa fa-at"></i> {{ label('global:eml_address') }} <br>
                        <i class="fa fa-at"></i> {{ label('global:eml_address1') }}
					</p>

				</div>
			</div>

		</div>
	</div>
</section>
@endsection