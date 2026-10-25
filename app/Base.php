<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
	protected $file_path = null;

	public function getUrlAttribute()
	{
		return url($this->slug == 'home' ? '/' : $this->slug);
	}

	public function getFDateAttribute()
	{
		return $this->created_at->format('d M, Y');
	}

	public function image($size = '400x300')
	{
		$image = 'uploads/'. $this->file_path .'/' . $this->image;

		if($this->image && file_exists(public_path($image))){
			return url('upload/'. $this->file_path .'/' . $size . '/' . $this->image);			
		}else{			
			return asset('images/default/' . $size . '.jpg');
		}
	}

	public function scopeActive($query)
	{
		return $query->where('status', 1);
	}

	public function getMTitleAttribute()
	{
		return $this->meta_title ? $this->meta_title : $this->title . ' - ' . config('app.name');
	}

	public function getMDescriptionAttribute()
	{
		return $this->meta_description ? $this->meta_description : $this->title;
	}

	public function getMKeywordAttribute()
	{
		return $this->meta_keyword ? $this->meta_keyword : $this->title;
	}
	
}
