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

        $fetch = function () use ($labelPage) {
            return DB::table('labels')->where('page', $labelPage)->pluck('value', 'labelid')->all();
        };

        $labels = Cache::remember($labelPage, 30 * 24 * 60 * 60, $fetch);

        // Entries cached by older code can hold objects that no longer unserialize.
        if (!is_array($labels)) {
            Cache::forget($labelPage);
            $labels = Cache::remember($labelPage, 30 * 24 * 60 * 60, $fetch);
        }
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
