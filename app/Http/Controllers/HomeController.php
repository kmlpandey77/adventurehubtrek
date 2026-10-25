<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page'] = \App\Page::home()->first();
        $data['slides'] = \App\Slide::home()->take(7)->get();
        $data['regions'] = \App\Region::take(3)->get();
        $data['feature_treks'] = \App\Package::featureTrek()->take(6)->get();
        $data['feature_tours'] = \App\Package::featureTour()->take(3)->get();
        $data['tibet'] = \App\Destination::find(5);
        $data['bhutan'] = \App\Destination::find(6);
        $data['activities'] = \App\Activity::where('destination_id', 4)->take(3)->get();
        $data['blogs'] = \App\Blog::orderBy('event_date', 'desc')->orderBy('created_at', 'desc')->take(3)->get();
        return view('index', $data);
    }
}
