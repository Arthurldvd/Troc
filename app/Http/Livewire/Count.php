<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Count extends Component
{

    public $count = 0;
    public string $search ='';

    public function increment(){
        $this->count = $this->count +1;
    }

    public function render()
    {
        return view('livewire.count');
    }
}
