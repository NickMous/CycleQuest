<?php

namespace App\Livewire\Misc;

use Livewire\Attributes\Title;
use Livewire\Component;

class UnderConstruction extends Component
{
    #[Title('Under Construction')]
    public function render()
    {
        return view('livewire.misc.under-construction')->layout('layouts.app');
    }
}
