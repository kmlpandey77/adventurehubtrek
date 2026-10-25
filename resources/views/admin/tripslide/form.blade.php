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
		Image size: 1000X500px
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($slide) ? $slide->details : null) }}</textarea>
	</div>
</div>

{{-- <div class="form-group">
	<label class="col-sm-2 control-label" for="details">Show in home page</label>
	<div class="col-sm-10">
		<input type="checkbox" value="1" name="in_home" {{ old('in_home', isset($slide) ? $slide->in_home:null ) == 1 ? 'checked="checked"' : null }}>
	</div>
</div> --}}