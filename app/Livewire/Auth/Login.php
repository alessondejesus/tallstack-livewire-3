<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email, $password, $message;

    public function login()
    {
        $credentials = $this->only([
            'email',
            'password'
        ]);

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            $this->redirect(route('calendar.index'), navigate: true);
        }

        $this->message = 'Credenciais não conferem';
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('components.layouts.auth');
    }
}
