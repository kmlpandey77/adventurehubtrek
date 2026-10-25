@extends('admin.app')

@section('title')
Reviews
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('reviews.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Name, Country</th>
				<th>Title</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($reviews as $review)			
			<tr>
				<td><img src="{{ $review->thumb('100x80') }}" alt="{{ $review->title }}"></td>
				<td>{{ $review->name }} <img src="{{ asset('flags/blank.gif') }}" class="flag flag-{{ strtolower($review->country->code) }}" alt="{{ $review->country->name }}" /></td>
				<td>{{ $review->title }}</td>
				<td>{{ $review->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('reviews.edit', $review->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('reviews.destroy', $review->id) }}" method="post">
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