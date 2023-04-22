<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\ContratDepotVente;

class PdfController extends Controller
{

    // public function getIdContrat()
    // {
    //     $res = 
    // }

    public function generatePDF()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML();
        return $pdf->stream();
    }

    // public function save(Request $request)
    // {
    //     $productName = $request->input("productName");
    // }
}
