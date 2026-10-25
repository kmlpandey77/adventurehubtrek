<?php
if (!function_exists('label')) {

	function label($labelID, $data = null)
	{
		if ($data) {
			return \App\Label::injectValue($labelID, $data);
		} else {
			return \App\Label::getValue($labelID);
		}
	}
}
