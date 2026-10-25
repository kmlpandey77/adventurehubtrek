<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpLookUp extends Model
{
    protected static $access_key = 'e8787d874ecdd3dc3f71d6b731fa6619';

    public static function getData(){

        $ip = request()->ip();        
        // $ip = '27.34.16.73';
        $ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.self::$access_key.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $api_result = json_decode($json, true);

        return $api_result;
    }
}
