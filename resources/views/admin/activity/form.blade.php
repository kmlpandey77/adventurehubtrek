<div class="form-group">
	<label class="col-sm-2 control-label" for="destination_id">Destination</label>
	<div class="col-sm-3">
		<select class="form-control" name="destination_id" id="destination_id">
			<option value="">None</option>
			@foreach ($destinations as $destination)
			<option value="{{ $destination->id }}" {{ $destination->id == old('destination_id', isset($activity) ? $activity->destination_id : null ) ? 'selected="selected"' : null }}>{{ $destination->title }}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($activity) ? $activity->title : null) }}" type="text" id="title">
	</div>
</div>

<div class="form-group">
	<div class="col-sm-3 col-sm-offset-2">
		<div class="checkbox">
			<label>
				<input type="checkbox" name="show_in_menu" class="show_in_menu" id="show_in_menu" value="1" {{ old('show_in_menu', isset($activity) ? $activity->show_in_menu : null) == 1 ? 'checked="checked"' : null }}> Show in Main Menu
			</label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="collapse" id="menu_title">
			<input type="text" name="menu_title" class="form-control" placeholder="Menu Title (optional)" value="{{ old('menu_title', isset($activity) ? $activity->menu_title : null) }}">
		</div>		
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($activity) ? $activity->details : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Thumb Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">
		Image size: {{ config('image.category_thumb.width') }}X{{ config('image.category_thumb.height') }}px
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_title">Meta title</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta title" name="meta_title" id="meta_title">{{ old('meta_title', isset($activity) ? $activity->meta_title : null) }}</textarea>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_description">Meta description</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta description" name="meta_description" id="meta_description">{{ old('meta_description', isset($activity) ? $activity->meta_description : null) }}</textarea>
	</div>

</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_keyword">Meta keyword</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta keyword" name="meta_keyword" id="meta_keyword">{{ old('meta_keyword', isset($activity) ? $activity->meta_keyword : null) }}</textarea>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-3 col-sm-offset-2">
		<div class="checkbox">
			<label>
				<input type="checkbox" name="status" id="status" value="1" {{ old('status', isset($activity) ? $activity->status : 1) == 1 ? 'checked=checked' : null  }}> Active
			</label>
		</div>
	</div>
</div>