<?php

namespace App\Livewire\Pengguna;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Pengguna')]

class Index extends Component
{
    public function render()
    {
        return view('livewire.pengguna.index');
    }
}
