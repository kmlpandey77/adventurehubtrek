<div class="form-group">
	<label class="col-sm-2 control-label" for="name">Name</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Name" name="name" value="{{ old('name', isset($legaldoc) ? $legaldoc->name : null) }}" type="text" id="name">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($legaldoc) ? $legaldoc->details : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">		
	</div>
</div>