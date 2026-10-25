@extends('admin.app')

@section('title')
Add slide
@endsection

@section('content')

<div class="content-form">
	<form class="form-horizontal" action="{{ route('regionslides.store', $region) }}" accept-charset="utf-8" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<input type="hidden" value="{{ $region }}" name="trip">
		@include('admin.regionslide.form')
		<div class="form-group">
			<label class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-sm-10"><input class="btn btn-success" name="submit" value="Save" type="submit" id="form_submit"></div>		
		</div>	
	</form>
</div>
@endsection