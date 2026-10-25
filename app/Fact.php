<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{	
	public function icon()
	{
		$icon = str_slug($this->title);
		return config('facts.'.$icon);
	}
	public function col()
	{
		$length = strlen($this->title . $this->value);
		if($length > 45){
			$col = 'col-sm-12';
		}else{
			$col = 'col-sm-6';
		}
		// var_dump($col);
		return $col;
	}
}
