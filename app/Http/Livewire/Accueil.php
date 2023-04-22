<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produit;
use App\Models\Magasin;
use App\Models\Adresse;
use App\Models\Pays;
use App\Http\ProduitController;



class Accueil extends Component
{
    public function render()
    {
        return view('livewire.accueil');
    }
}
