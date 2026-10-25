@extends('admin.app')

@section('title')
Activities
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('activities.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Destination</th>
				<th>Image</th>
				<th>Title</th>
				<th>Url</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($activities as $activity)			
			<tr>
				<td>{{ $activity->destination->title }}</td>
				<td><img src="{{ $activity->image('100x80') }}" alt="{{ $activity->title }}" width="80"></td>
				<td>{{ $activity->title }}</td>
				<td>{{ '/' . $activity->slug }}</td>
				<td>
					@if ($activity->status)
						<a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to show" href="{{ route('activities.showhide', $activity->id) }}"><i class="lnr lnr-checkmark-circle"></i></a>	
					@else
						<a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to hide" href="{{ route('activities.showhide', $activity->id) }}"><i class="lnr lnr-cross-circle"></i></a>						
					@endif
					[{{ $activity->status ? 'Active' : 'Draft' }}]
				</td>				
				<td class="text-right">
					<a class="btn btn-default btn-sm" href="{{ route('activityslides.index', $activity->id) }}">Slide</a>				
					<a class="btn btn-primary btn-sm" href="{{ route('activities.edit', $activity->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('activities.destroy', $activity->id) }}" method="post">
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