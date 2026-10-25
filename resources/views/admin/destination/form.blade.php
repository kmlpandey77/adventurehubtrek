<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($destination) ? $destination->title : null) }}" type="text" id="title">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($destination) ? $destination->details : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">
		Image size: {{ config('image.destination.width') }}X{{ config('image.destination.height') }}px
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_title">Meta title</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta title" name="meta_title" id="meta_title">{{ old('meta_title', isset($destination) ? $destination->meta_title : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_description">Meta description</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta description" name="meta_description" id="meta_description">{{ old('meta_description', isset($destination) ? $destination->meta_description : null) }}</textarea>
	</div>

</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_keyword">Meta keyword</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta keyword" name="meta_keyword" id="meta_keyword">{{ old('meta_keyword', isset($destination) ? $destination->meta_keyword : null) }}</textarea>
	</div>
</div>