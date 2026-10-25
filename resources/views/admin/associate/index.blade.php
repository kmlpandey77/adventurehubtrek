@extends('admin.app')

@section('title')
Associate
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('associates.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Link</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($associates as $associate)
			<tr>
				<td>{{ $associate->title }}</td>
				<td>{{ $associate->link }}</td>
				<td>{{ $associate->created_at->format('M d, Y') }}</td>
				<td class="text-right">
					<a class="btn btn-primary btn-sm" href="{{ route('associates.edit', $associate->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;">
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('associates.destroy', $associate->id) }}" method="post">
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
