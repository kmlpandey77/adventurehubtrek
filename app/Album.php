<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
    	'title', 'slug',
    ];

    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }

    public function getThumbAttribute()
    {
    	$photo = $this->photos()->first();
    	if($photo){
    		return $photo->image();
    	}
    	return false;
    }
}
