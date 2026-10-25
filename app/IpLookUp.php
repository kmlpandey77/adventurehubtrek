<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpLookUp extends Model
{
    public static function getData(){

        $key = config('services.ipstack.key');
        if (!$key) {
            return null;
        }

        $ip = request()->ip();
        // $ip = '27.34.16.73';
        $ch = curl_init('http://api.ipstack.com/'.rawurlencode($ip).'?access_key='.rawurlencode($key));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $json = curl_exec($ch);
        curl_close($ch);
        $api_result = json_decode((string) $json, true);

        return $api_result;
    }
}
