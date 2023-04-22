<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContratDepotVente;

class ContratData extends Component
{
    public string $idContrat;

    public function mount($idContrat){
        $this->idContrat = $idContrat;
        $this->contratdepotvente = ContratDepotVente::where('idcontrat', $this->idContrat)
        ->get();
    }

    public function render()
    {
        return view('livewire.contrat-data');
    }
}
