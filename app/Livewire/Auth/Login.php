<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ];

    protected $messages = [
        'email.required' => 'Email obrigatório',
        'email.email' => 'Formato de email',
        'password.required' => 'Senha obrigatória',
        'password.min' => 'Senha deve conter no mínimo 6 caracteres'
    ];

    public function login()
    {
        $this->validate();

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            session()->regenerate();
            
            if(Auth::user()->role === 'admin'){
                return redirect()->route('admin.dashboard');
            }
            if(Auth::user()->role === 'cliente'){
                return redirect()->route('cliente.dashboard');
            }
            if(Auth::user()->role === 'funcionario'){
                return redirect()->route('funcionario.dashboard');
            }

        }

        session()->flash('error', 'Email ou senha incorretos');
    }



    public function render()
    {
        return view('livewire.auth.login');
    }
}
