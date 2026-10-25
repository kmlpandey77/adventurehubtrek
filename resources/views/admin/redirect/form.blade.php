<div class="form-group">
	<label class="col-sm-2 control-label" for="from_url">From</label>
	<div class="col-sm-6">
		<div class="input-group">
			<div class="input-group-addon">{{ config('app.url') }}/</div>
			<input class="form-control" placeholder="" name="from_url" value="{{ old('from_url', isset($redirect) ? $redirect->from_url : null) }}" type="text" id="from_url">
		</div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="to_url">To</label>
	<div class="col-sm-6">
		<div class="input-group">
			<div class="input-group-addon">{{ config('app.url') }}/</div>
			<input class="form-control" placeholder="" name="to_url" value="{{ old('to_url', isset($redirect) ? $redirect->to_url : null) }}" type="text" id="to_url">
		</div>
	</div>
</div>