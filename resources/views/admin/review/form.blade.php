<div class="form-group">
	<label class="col-sm-2 control-label" for="name">Name</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Name" name="name" value="{{ old('name', isset($review) ? $review->name : null) }}" type="text" id="name">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="email">Email</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Email" name="email" value="{{ old('email', isset($review) ? $review->email : null) }}" type="text" id="email">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="country_id">Country</label>
	<div class="col-sm-6">
		<select class="form-control" name="country_id" id="country_id">
			<option value="">Select Country</option>
			@foreach ($countries as $country)
			<option value="{{ $country->id }}" {{ $country->id == old('country', isset($review) ? $review->country_id : null ) ? 'selected="selected"' : null }}>{{ $country->name }}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($review) ? $review->title : null) }}" type="text" id="title">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="package_id">Trip</label>
	<div class="col-sm-4">
		<select class="form-control" name="package_id" id="package_id">
			<option value="0">None</option>
			@foreach ($packages as $package)
			<option value="{{ $package->id }}" {{ $package->id == old('package_id', isset($review) ? $review->package_id : null ) ? 'selected="selected"' : null }}>{{ $package->title }}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="event_date">Event Date</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control datepicker" placeholder="Event Date" name="event_date" value="{{ old('event_date', isset($review) ? $review->event_date : null) }}" type="text" id="event_date">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="rating">Rating</label>
	<div class="col-sm-4">
		<select class="form-control" name="rating" id="rating">
			<option value="1" {{ 1 == old('rating', isset($review) ? $review->rating : null ) ? 'selected="selected"' : null }}>1</option>
			<option value="2" {{ 2 == old('rating', isset($review) ? $review->rating : null ) ? 'selected="selected"' : null }}>2</option>
			<option value="3" {{ 3 == old('rating', isset($review) ? $review->rating : null ) ? 'selected="selected"' : null }}>3</option>
			<option value="4" {{ 4 == old('rating', isset($review) ? $review->rating : null ) ? 'selected="selected"' : null }}>4</option>
			<option value="5" {{ 5 == old('rating', isset($review) ? $review->rating : null ) ? 'selected="selected"' : null }}>5</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($review) ? $review->details : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">
		{{-- Image size: 900X400px --}}
	</div>
</div>