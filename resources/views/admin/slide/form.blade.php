<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($slide) ? $slide->title : null) }}" type="text" id="title">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">
		Image size: {{ config('image.slide.width') }}X{{ config('image.slide.height') }}px
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($slide) ? $slide->details : null) }}</textarea>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="link">Link</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Link" name="link" value="{{ old('link', isset($slide) ? $slide->link : null) }}" type="text" id="link">
	</div>
</div>
<div class="form-group">
	<div class="col-sm-3 col-sm-offset-2">
		<div class="checkbox">
			<label>
				<input type="checkbox" name="status" id="status" value="1" {{ old('status', isset($slide) ? $slide->status : 1) == 1 ? 'checked=checked' : null  }}> Active
			</label>
		</div>
	</div>
</div>