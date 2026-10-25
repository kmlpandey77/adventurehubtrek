@extends('admin.app')

@section('title')
Legal Docs
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('legaldocs.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>
<div class="content-table">
	@if (count($legaldocs) > 0)		

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="sortable">
			@foreach ($legaldocs as $legaldoc)
			<tr id="{{ $legaldoc->id }}">
				<td><img src="{{ asset('uploads/legaldocs/' . $legaldoc->image) }}" width="100" alt=""></td>
				<td>{{ $legaldoc->name }}</td>
				<td>{{ $legaldoc->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('legaldocs.edit', $legaldoc->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('legaldocs.destroy', $legaldoc->id) }}" method="post">
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
				url = "{{ route('legaldocs.order') }}";
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