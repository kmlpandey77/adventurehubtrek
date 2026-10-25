<?php

namespace App\Http\Controllers;

use App\Package;
use App\Page;
use Dompdf\Dompdf;

use Illuminate\Http\Request;

class PrintController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $package = Package::where('slug',$slug)->first();
        $contact = Page::find(39)->details;
        return view('print', compact('package', 'contact'));
    }

    public function pdf(Request $request, $slug)
    {
        
        $package = Package::where('slug',$slug)->first();
        $contact = Page::find(3)->details;
        dd($contact);
        $view = view('pdf', compact('package', 'contact'));
        // return view('pdf', compact('package', 'contact'));

        $dompdf = new Dompdf();
        $dompdf->loadHtml("$view");
        $dompdf->render();
        // $dompdf->stream($slug . ".pdf", array("Attachment" => false));
        $dompdf->stream($slug . ".pdf");
    }
}
