<?php

namespace App\Http\Controllers;

use App\Package;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['package'] = $package = Package::where('slug',$request->path())->first();
        $data['slides'] = $package->slides;        
        $data['related_trip'] = $package->category()->packages->where('id',"<>" , $package->id);
        $data['infos'] = Package::tripInfo($package->category_id);
        $data['review'] = $package->reviews()->count() ? $package->reviews()->first() : null;
        return view('package', $data);
    }
}
