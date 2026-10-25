@extends('admin.app')

@section('title')
Team Categories
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('teams.index') }}" class="btn btn-default"><span>Back to Team</span></a>
	<a href="{{ route('teamcategories.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Title</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="sortable">
			@foreach ($teamcategories as $category)			
			<tr id="{{ $category->id }}">
				<td>{{ $category->title }}</td>
				<td>{{ $category->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('teamcategories.edit', $category->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('teamcategories.destroy', $category->id) }}" method="post">
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
				url = "{{ route('teamcategories.order') }}";
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