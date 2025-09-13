<?php

namespace App\Livewire\Login;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class LoginForm extends Component
{
    // Heading Title
    #[Title('Login')] 

    // Property
    public $username;
    public $password;

    public function render()
    {
        return view('livewire.login.login-form');
    }

    public function login()
    {
        // Validate
        $validated = $this->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Auth dengan username & password
            if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
                session()->regenerate();
                return redirect()->intended('/dashboard'); // sesuaikan redirect
            }
            session()->flash('errors', 'Username atau password salah.');

    }
}
