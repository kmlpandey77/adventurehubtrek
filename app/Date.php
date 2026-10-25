<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{	
	protected $statuses = [
		'1' => 'Available',
		'2' => 'Limited',
		'3' => 'Closed',
	];

	public function package()
	{
		return $this->belongsTo('App\Package');
	}

	public function start()
	{
		return date('M d, Y', strtotime($this->start));
	}
	public function end()
	{
		return date('M d, Y', strtotime($this->end));
	}

	public function price()
	{
		if($this->price){
			return $this->price;
		}else{
			return $this->package->price;
		}
	}
	public function status()
	{
		return $this->statuses[$this->status];
	}
	
}
