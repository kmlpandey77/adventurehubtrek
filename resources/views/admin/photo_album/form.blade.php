<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Album Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Album Title" name="title" value="{{ old('title', isset($album) ? $album->title : null) }}" type="text" id="title">
	</div>
</div>

@if (isset($album) && $album->photos->count() > 0)
	<hr>
	<div class="row">
		@foreach ($album->photos as $album)
		<div class="col-sm-3">
			<div class="album-photo" style="margin-bottom: 30px;">
				<img src="{{ asset('uploads/photo/'.$album->image) }}" class="img-fluid" height="150">
				<input type="hidden" name="edit_image_id[]" value="{{$album->id}}">
				<textarea class="form-control" name="edit_image_caption[]">{{$album->caption}}</textarea>
				<a href="javascript:void(0)" class="btn btn-danger btn-block photo-delete" data-id="{{$album->id}}"><span class="lnr lnr-cross-circle"></span> delete </a>
			</div>
		</div>
		@endforeach
	</div>
	<hr>
@endif

<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-4"><input type="file" name="image[]" id="image"></div>
			<div class="col-sm-8"><textarea name="image_caption[]" placeholder="Image caption (optional)" class="form-control"></textarea></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><input type="file" name="image[]" id="image"></div>
			<div class="col-sm-8"><textarea name="image_caption[]" placeholder="Image caption (optional)" class="form-control"></textarea></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><input type="file" name="image[]" id="image"></div>
			<div class="col-sm-8"><textarea name="image_caption[]" placeholder="Image caption (optional)" class="form-control"></textarea></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><input type="file" name="image[]" id="image"></div>
			<div class="col-sm-8"><textarea name="image_caption[]" placeholder="Image caption (optional)" class="form-control"></textarea></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><input type="file" name="image[]" id="image"></div>
			<div class="col-sm-8"><textarea name="image_caption[]" placeholder="Image caption (optional)" class="form-control"></textarea></div>
		</div>
	</div>
</div>

@section('script')
	<script>
		$(function() {
			$('.photo-delete').click(function () {
				$(this).parent().parent().remove();
				id = $(this).data('id');
				url = "{{ route('albums.photodelete') }}"
				$.ajax(url, {
					data: {
						id: id,
						_token: "{{csrf_token()}}",
					},
					type:'POST',
				});
			});
		});
	</script>
@endsection