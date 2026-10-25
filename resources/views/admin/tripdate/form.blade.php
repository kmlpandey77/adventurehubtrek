<div class="form-group">
	<label class="col-sm-2 control-label" for="start">Start date</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control datepicker" placeholder="Start date" name="start" value="{{ old('start', isset($date) ? $date->start : null) }}" type="text" id="start">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="end">End date</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control datepicker" placeholder="End date" name="end" value="{{ old('end', isset($date) ? $date->end : null) }}" type="text" id="end">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="price">Price</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Price" name="price" value="{{ old('price', isset($date) ? $date->price : null) }}" type="text" id="price">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="status">Status</label>
	<div class="col-sm-4">
		<select name="status" id="status" class="form-control">
			<option value="">Select</option>
			<option value="1" {{ old('status', isset($date) ? $date->status : 0) == 1 ? 'selected="selected"':null }}>Available</option>
			<option value="2" {{ old('status', isset($date) ? $date->status : 0) == 2 ? 'selected="selected"':null }}>Limited</option>
			<option value="3" {{ old('status', isset($date) ? $date->status : 0) == 3 ? 'selected="selected"':null }}>Closed</option>
		</select>
	</div>
</div>