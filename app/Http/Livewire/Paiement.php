<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Paiement extends Component
{

    public function mount()
    {
        var_dump('oe');
    }

    public function render()
    {
        return view('livewire.paiement');
    }
}
