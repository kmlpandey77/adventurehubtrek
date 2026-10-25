@extends('admin.app')

@section('title')
Labels
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('labels.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Page</th>
				<th>Label Id</th>
				<th>Value</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($labels as $label)				
			<tr>
				<td>{{ $label->page }}</td>
				<td>{{ $label->labelid }}</td>
				<td>{{ $label->value }}</td>
				<td>{{ $label->created_at->format('M d, Y') }}</td>
				<td class="text-right">
					
						<a class="btn btn-primary btn-sm" href="{{ route('labels.edit', $label->id) }}"><i class="lnr lnr-pencil"></i></a>

						<div class="pull-right" style="margin-left: 10px;"> 
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('labels.destroy', $label->id) }}" method="post">
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