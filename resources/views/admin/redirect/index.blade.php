@extends('admin.app')

@section('title')
Redirect
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('redirects.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>From</th>
				<th>To</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($redirects as $redirect)				
			<tr>
				<td>{{ $redirect->from_url }}</td>
				<td>{{ $redirect->to_url }}</td>
				<td>{{ $redirect->created_at->format('M d, Y') }}</td>
				<td class="text-right">
					
						<a class="btn btn-primary btn-sm" href="{{ route('redirects.edit', $redirect->id) }}"><i class="lnr lnr-pencil"></i></a>

						<div class="pull-right" style="margin-left: 10px;"> 
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('redirects.destroy', $redirect->id) }}" method="post">
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