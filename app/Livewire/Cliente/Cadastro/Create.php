<?php

namespace App\Livewire\Cliente\Cadastro;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{

    public $email;
    public $password;
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;

    protected $rules = [
        'nome' => 'required|max:80',
        'endereco' => 'required|max:255|min:5',
        'telefone' => 'required|max:20|min:8',
        'cpf' => 'required|unique:clientes|max:11',
        'email' => 'required|unique:users|email',
        'password' => 'required|min:6'
    ];

    protected $messages = [
        'nome.required' => 'O campo é obrigatório',
        'nome.max' => 'O número máximo de caracteres é 80',
        'endereco.required' => 'O campo é obrigatório',
        'endereco.max' => 'O número máximo de caracteres é 255',
        'endereco.min' => 'O número mínimo de caracteres é 5',
        'telefone.required' => 'O campo é obrigatório',
        'telefone.max' => 'O número máximo de caracteres é 20',
        'telefone.min' => 'O número mínimo de caracteres é 8',
        'cpf.required' => 'O campo é obrigatório',
        'cpf.unique' => 'O campo deve ser único',
        'cpf.max' => 'O número máximo de caracteres é 11',
        'email.required' => 'O campo é obrigatório',
        'email.unique' => 'O campo deve ser único',
        'email.email' => 'O campo deve ter formato de email',
        'password.required' => 'O campo é obrigatório',
        'password.min' => 'O número mínimo de caracteres é 6'
    ];


    public function cadastrarCliente()
    {

        $this->validate();

        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'cliente'
        ]);

        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'user_id' => $user->id
        ]);

        session()->flash('success', "Cadastro Realizado com Sucesso!");
    }

    public function render()
    {
        return view('livewire.cliente.cadastro.create');
    }
}
