<?php

namespace App;

use App\Base;

class Photo extends Base
{
    protected $file_path = 'photo';

    protected $fillable = [
    	'album_id', 'image', 'caption',
    ];

    public function album()
    {
    	return $this->belongsTo('App\Album');
    }
}
