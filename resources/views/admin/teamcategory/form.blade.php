<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($teamcategory) ? $teamcategory->title : null) }}" type="text" id="title">
	</div>
</div>
