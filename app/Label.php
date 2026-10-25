<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;

class Label extends Model
{
    public static function getValue($labelID)
    {
        list($labelPage, $id) = explode(':', $labelID);

        $labels = Cache::remember($labelPage, 30 * 24 * 60, function () use ($labelPage) {
            return DB::table('labels')->where('page', $labelPage)->pluck('value', 'labelid');
        });
        if (isset($labels[$labelID]) && isset($labels[$labelID]) && $labels[$labelID]) {
            return $labels[$labelID];
        }

        return $labelID;
    }

    public static function injectValue($labelID, $data)
    {
        $value = self::getValue($labelID);
        if (is_array($data)) { } else {

            $value = preg_replace("/(:\w+)/", $data, $value);
        }
        return $value;
    }
}
