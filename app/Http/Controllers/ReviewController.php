<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Page;

class ReviewController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page =  Page::where('slug',$request->path())->first();
        $reviews = Review::paginate(10);        
        return view('reviews', compact('reviews', 'page'));
    }

    
}
