<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home')->layout('layouts.main')->title(__('home.title'));
    }
}
