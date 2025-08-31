<?php

namespace App\Livewire\Pengguna;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.pengguna.show')
            ->title('Pengguna - ' . $this->user->name);
    }
}
