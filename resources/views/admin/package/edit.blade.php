@extends('admin.app') 
@section('title') Edit Package
@endsection
 
@section('content')

<div class="card">
	<form class="form-horizontal" action="{{ route('packages.update', $package->id) }}" accept-charset="utf-8" method="post"
	 enctype="multipart/form-data">
	{{ method_field('PUT') }} {!! csrf_field() !!}
	@include('admin.package.form')
	
		<div class="card-footer">
			<div class="form-group">
				<div class="col-sm-10"><input class="btn btn-success" name="submit" value="Save" type="submit" id="form_submit"></div>
			</div>

		</div>
	</form>
</div>
@endsection