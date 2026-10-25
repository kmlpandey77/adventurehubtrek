@extends('admin.app')

@section('title')
Dates
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('packages.index') }}" class="btn btn-default"><i class="lnr lnr-plus-back"></i> <span>Back to Package</span></a>
	<a href="{{ route('tripdates.create', $trip) }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Package</th>
				<th>Start</th>
				<th>End</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($dates as $date)			
			<tr>
				<td>{{ $date->package->title }}</td>
				<td>{{ $date->start }}</td>
				<td>{{ $date->end }}</td>
				<td>{{ $date->status() }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('tripdates.edit', $date->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('tripdates.destroy', $date->id) }}" method="post">
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