<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf;

class GraphPdfController extends Controller
{
    /**
     * Write code on Construct
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('graph');
    }

    /**
     * Write code on Construct
     *
     * @return \Illuminate\Http\Response
     */
    public function dwn()
    {
        $render = view('graph')->render();

        $pdf = new Pdf;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        $pdf->saveAs(public_path('report.pdf'));

        return response()->download(public_path('report.pdf'));
    }
}
