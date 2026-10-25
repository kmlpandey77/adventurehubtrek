@extends('admin.app')

@section('title')
Teams
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('teamcategories.index') }}" class="btn btn-default"><i class="lnr lnr-list"></i> <span>Category</span></a>
	<a href="{{ route('teams.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="row">
	<div class="col-sm-9 text-right">Filter</div>
	<div class="col-sm-3">
		<form action="">
			<select onchange="this.form.submit()" name="category" id="category" class="form-control">
				<option value="0">All Category</option>
				@foreach ($categories as $category)
				<option {{ request()->category == $category->id ? 'selected="selected"' : null  }} value="{{ $category->id }}">{{ $category->title }}</option>			
				@endforeach
			</select>
		</form>
	</div>	
</div>

<hr>

<div class="content-table">
	@if (count($teams) > 0)		

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Position</th>
				<th>Category</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="sortable">
			@foreach ($teams as $team)
			<tr id="{{ $team->id }}">
				<td><img src="{{ $team->thumb('100x80') }}" alt="{{ $team->title }}"></td>
				<td>{{ $team->name }}</td>
				<td>{{ $team->position }}</td>
				<td>{{ $team->teamcategory ? $team->teamcategory->title : '-' }}</td>
				<td>{{ $team->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('teams.edit', $team->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('teams.destroy', $team->id) }}" method="post">
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
	@else
	<p>Record not found.</p>
	@endif
</div>
@endsection
@section('script')

@if (request()->category)
<script>
	$( function() {
		$( "#sortable" ).sortable({
			update: function (event, ui) {
				var data = $(this).sortable('toArray');
				url = "{{ route('teams.order') }}";
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