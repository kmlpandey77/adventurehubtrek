@extends('admin.app')

@section('title')
Blogs
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('blogs.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Title</th>
				<th>Url</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($blogs as $blog)			
			<tr>
				{{-- <td><img src="{{ $blog->thumb() }}" alt="{{ $blog->title }}"></td> --}}
				<td>{{ $blog->title }}</td>
				<td>{{ '/' . $blog->slug }}</td>
				<td>{{ $blog->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('blogs.edit', $blog->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('blogs.destroy', $blog->id) }}" method="post">
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