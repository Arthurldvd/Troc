<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Layout extends Component
{

    public string $search = '';

    public function render()
    {
        return view('livewire.layout');
    }
}
