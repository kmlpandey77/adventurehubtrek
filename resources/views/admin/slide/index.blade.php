@extends('admin.app')

@section('title')
Slides
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('slides.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Title</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="sortable">
			@foreach ($slides as $slide)			
			<tr id="{{ $slide->id }}">
				<td><img src="{{ $slide->image('80x60') }}" alt="{{ $slide->title }}" width="80"></td>
				<td>{{ $slide->title }}</td>
				<td>
					@if ($slide->status)
						<a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to show" data-method="post" href="{{ route('slides.showhide', $slide->id) }}"><i class="lnr lnr-checkmark-circle"></i></a>
					@else
						<a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to hide" data-method="post" href="{{ route('slides.showhide', $slide->id) }}"><i class="lnr lnr-cross-circle"></i></a>
					@endif
					[{{ $slide->status ? 'Active' : 'Draft' }}]
				</td>
				<td class="text-right">

					<a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to edit" href="{{ route('slides.edit', $slide->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('slides.destroy', $slide->id) }}" method="post">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to delete"><i class="lnr lnr-trash"></i></button>
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
				url = "{{ route('slides.order') }}";
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