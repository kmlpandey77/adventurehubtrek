<?php

namespace App\Http\Controllers\Admin;

use App\Legaldoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class LegaldocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $legaldocs = Legaldoc::all();
        return view('admin.legaldoc.index', compact('legaldocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.legaldoc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',            
            'image' => 'required',
        ]);

        $legaldoc = new Legaldoc;
        $legaldoc->name = $request->name;
        $legaldoc->details = $request->details;
        $legaldoc->order_by = (Legaldoc::max('order_by') + 1);
        $legaldoc->save();

        if ($request->hasFile('image')) {
            $image_name = 'legaldoc-'.$legaldoc->id . '.'.$request->image->extension();
            $path = $request->image->move('uploads/legaldocs/', $image_name);
            $legaldoc->image = $image_name;
            $legaldoc->save();
            
        }

        return redirect()->route('legaldocs.index')->with('success', 'Legaldoc added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Legaldoc  $legaldoc
     * @return \Illuminate\Http\Response
     */
    public function show(Legaldoc $legaldoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Legaldoc  $legaldoc
     * @return \Illuminate\Http\Response
     */
    public function edit(Legaldoc $legaldoc)
    {
        return view('admin.legaldoc.edit', compact('legaldoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Legaldoc  $legaldoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Legaldoc $legaldoc)
    {
        $this->validate($request, [
            'name' => 'required',            
            'image' => 'required',
        ]);

        $legaldoc->name = $request->name;
        $legaldoc->details = $request->details;
        $legaldoc->save();

        if ($request->hasFile('image')) {
            $image_name = 'legaldoc-'.$legaldoc->id . '.'.$request->image->extension();
            $path = $request->image->move('uploads/legaldocs/', $image_name);
            $legaldoc->image = $image_name;
            $legaldoc->save();
            
        }
        return redirect()->route('legaldocs.index')->with('success', 'Legaldoc saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Legaldoc  $legaldoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Legaldoc $legaldoc)
    {
        if($legaldoc){

            if($legaldoc->image){
                $image = public_path('uploads/Legaldocs/' . $legaldoc->image);
                if(file_exists($image)){
                    unlink($image);
                }
            }

            if($legaldoc->delete()){
                return redirect()->route('legaldocs.index')->with('success', 'Legaldoc deleted.');
            }else{
                return redirect()->route('legaldocs.index')->with('error', 'Error while deleting Legaldoc.');
            }

        }else{
            abort();
        }
    }

    public function order(Request $request)
    {
        foreach ($request->data as $odr => $id) {
            $odr = $odr + 1;
            $legaldoc = Legaldoc::find($id);
            $legaldoc->order_by = $odr;
            $legaldoc->save();
        }
    }
}
