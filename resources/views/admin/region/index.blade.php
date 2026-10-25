@extends('admin.app')

@section('title')
Regions
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('regions.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Destination</th>
				<th>Activity</th>
				<th>Title</th>
				<th>Url</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="sortable">
			@foreach ($regions as $region)			
			<tr id="{{$region->id}}">
				<td><img src="{{ $region->image('100x80') }}" alt="{{ $region->title }}" width="80"></td>
				<td>{{ $region->activity->destination->title }}</td>
				<td>{{ $region->activity->title }}</td>
				<td>{{ $region->title }}</td>
				<td>{{ '/' . $region->slug }}</td>
				<td>
					@if ($region->status)
						<a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to show" href="{{ route('regions.showhide', $region->id) }}"><i class="lnr lnr-checkmark-circle"></i></a>
					@else
						<a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to hide" href="{{ route('regions.showhide', $region->id) }}"><i class="lnr lnr-cross-circle"></i></a>
						
					@endif
					[{{ $region->status ? 'Active' : 'Draft' }}]
				</td>
				<td class="text-right">
					<a class="btn btn-default btn-sm" href="{{ route('regionslides.index', $region->id) }}">Slide</a>			
					<a class="btn btn-primary btn-sm" href="{{ route('regions.edit', $region->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('regions.destroy', $region->id) }}" method="post">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button type="submit" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></button>
						</form>
					</div>
				</td>
			</tr>			
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@section('script')
<script>
	$( function() {
		$( "#sortable" ).sortable({
			update: function (event, ui) {
				var data = $(this).sortable('toArray');
				url = "{{ route('regions.order') }}";
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
@endsection