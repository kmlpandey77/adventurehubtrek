<?php

namespace App\Http\Controllers;

use App\Package;
use App\Country;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Subscriber;

use App\Mail\CustomizeTrip;
use App\Mail\AutoResponse;

class CustomizeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required',
            'country' => 'required',
            'number_of_traveller' => 'required',
            'message' => 'required',
        ]);

        $subscriber = Subscriber::where('email', $request->email)->first();
        if(!$subscriber){
            $subscriber = new Subscriber;
            $subscriber->email = $request->email;
            $subscriber->name = $request->name;
            $subscriber->phone = $request->phone;
            $subscriber->save();
        }

        
        return new CustomizeTrip($request);
        Mail::send(new CustomizeTrip($request));
        Mail::send(new AutoResponse($request->full_name, $request->email));
        return redirect()->route('thankyou');
    }
}
