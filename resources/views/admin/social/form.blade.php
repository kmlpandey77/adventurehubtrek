<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($social) ? $social->title : null) }}" type="text" id="title">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="icon">Icon</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Icon" name="icon" value="{{ old('icon', isset($social) ? $social->icon : null) }}" type="text" id="icon">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="link">Link</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Link" name="link" value="{{ old('link', isset($social) ? $social->link : null) }}" type="text" id="link">
	</div>
</div>