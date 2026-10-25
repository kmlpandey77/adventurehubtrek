<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('admin.subscriber.index', compact('subscribers'));
    }
}
