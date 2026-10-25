<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($blog) ? $blog->title : null) }}" type="text" id="title">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="event_date">Event Date</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control datepicker" placeholder="Event Date" name="event_date" value="{{ old('event_date', isset($blog) ? $blog->event_date : null) }}" type="text" id="event_date">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($blog) ? $blog->details : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">
		Image size: 1000X500px
	</div>
</div>