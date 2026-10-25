@extends('admin.app')

@section('title')
Slides
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('regions.index') }}" class="btn btn-default"><i class="lnr lnr-plus-circle"></i> <span>Back</span></a>
	<a href="{{ route('regionslides.create', $region) }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Title</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($slides as $slide)			
			<tr>
				<td><img src="{{ $slide->image('100x80') }}" alt="{{ $slide->title }}" width="80"></td>
				<td>{{ $slide->title }}</td>
				<td>{{ $slide->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('regionslides.edit', $slide->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('regionslides.destroy', $slide->id) }}" method="post">
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