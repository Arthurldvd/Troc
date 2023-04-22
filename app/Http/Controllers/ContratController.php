<?php

namespace App\Http\Controllers;
use App\Models\ContratDepotVente;

use Illuminate\Http\Request;

class ContratController extends Controller
{
    public function showContrat($numerocontratdepotvente)
    {
        return view('contrat.contratdepotvente', ['numerocontratdepotvente' => $numerocontratdepotvente]);
    }
}