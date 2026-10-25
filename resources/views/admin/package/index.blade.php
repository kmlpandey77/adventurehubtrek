@extends('admin.app')

@section('title')
Packages
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('packages.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="row">
	<div class="col-sm-6 text-right">Filter</div>
	<div class="col-sm-3">
		<form action="">
			<select onchange="this.form.submit()" name="activity" id="activity" class="form-control">
				<option value="0">All Activity</option>
				@foreach ($activities as $activity)
				<option {{ request()->activity == $activity->id ? 'selected="selected"' : null  }} value="{{ $activity->id }}">{{ $activity->title }}</option>			
				@endforeach
			</select>
		</form>
	</div>
	<div class="col-sm-3">
		<form action="">
			<select onchange="this.form.submit()" name="region" id="region" class="form-control">
				<option value="0">All Region</option>
				@foreach ($regions as $region)
				<option {{ request()->region == $region->id ? 'selected="selected"' : null  }} value="{{ $region->id }}">{{ $region->title }}</option>			
				@endforeach
			</select>
		</form>
	</div>
</div>

<hr>

@if (count($packages) > 0)
<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Category</th>
				<th>Title</th>
				<th>Url</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="sortable">
			@foreach ($packages as $package)
			<tr id="{{ $package->id }}">
				<td>{{ $package->category() ? $package->category()->title : '-' }}</td>
				<td>{{ $package->title }}</td>
				<td>{{ '/' . $package->slug }}</td>
				<td>
					@if ($package->status)
						<a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to show" data-method="post" href="{{ route('packages.showhide', $package->id) }}"><i class="lnr lnr-checkmark-circle"></i></a>						
					@else
						<a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to hide" data-method="post" href="{{ route('packages.showhide', $package->id) }}"><i class="lnr lnr-cross-circle"></i></a>						
					@endif
					[{{ $package->status ? 'Active' : 'Draft' }}]
				</td>
				<td class="text-right">
					<a class="btn btn-default btn-sm" href="{{ route('tripslides.index', [$package->id, 'activity' => request()->activity, 'region' => request()->region]) }}">Slide</a>				
					<a class="btn btn-default btn-sm" href="{{ route('tripdates.index', [$package->id, 'activity' => request()->activity, 'region' => request()->region]) }}">Dates</a>				
					<a class="btn btn-primary btn-sm" href="{{ route('packages.edit', [$package->id, 'activity' => request()->activity, 'region' => request()->region]) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('packages.destroy', [$package->id, 'activity' => request()->activity, 'region' => request()->region]) }}" method="post">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button type="submit" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></button>
						</form>
					</div>
				</td>
			</tr>		
			@endforeach
			<tr>
				<td colspan="5">{{ $packages->links() }}</td>
			</tr>
		</tbody>
	</table>
</div>
@else
<p>Record(s) not found!!!</p>
@endif
@endsection

@section('script')

@if (request()->activity || request()->region)
<script>
	$( function() {
		$( "#sortable" ).sortable({
			update: function (event, ui) {
				var data = $(this).sortable('toArray');
				url = "{{ route('packages.order') }}";
				$.ajax(url, {
					data: {
						'_token': "{{ csrf_token() }}",
						'data':data
					},
					type: 'POST',
				});
			}
		});
	} );
</script>
@endif
@endsection