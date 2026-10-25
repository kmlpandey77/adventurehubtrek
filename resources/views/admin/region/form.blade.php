<div class="form-group">
	<label class="col-sm-2 control-label" for="activity_id">Activity</label>
	<div class="col-sm-3">
		<select class="form-control" name="activity_id" id="activity_id">
			<option value="">Select</option>
			@foreach ($destinations as $destination)
			<optgroup label = "{{ $destination->title }}">
				@foreach ($destination->activities as $activity)					
				<option value="{{ $activity->id }}" {{ $activity->id == old('activity_id', isset($region) ? $region->activity_id : null ) ? 'selected="selected"' : null }}>{{ $activity->title }}</option>
				@endforeach
			</optgroup>
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($region) ? $region->title : null) }}" type="text" id="title">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($region) ? $region->details : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">
		Image size: {{ config('image.thumb.width') }}X{{ config('image.thumb.height') }}px
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_title">Meta title</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta title" name="meta_title" id="meta_title">{{ old('meta_title', isset($region) ? $region->meta_title : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_description">Meta description</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta description" name="meta_description" id="meta_description">{{ old('meta_description', isset($region) ? $region->meta_description : null) }}</textarea>
	</div>

</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_keyword">Meta keyword</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta keyword" name="meta_keyword" id="meta_keyword">{{ old('meta_keyword', isset($region) ? $region->meta_keyword : null) }}</textarea>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-3 col-sm-offset-2">
		<div class="checkbox">
			<label>
				<input type="checkbox" name="status" id="status" value="1" {{ old('status', isset($region) ? $region->status : 1) == 1 ? 'checked=checked' : null  }}> Active
			</label>
		</div>
	</div>
</div>