<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\{
    Redirect,
    Mail,
    Http,
    DB
};
use App\Models\{
    Endereco,
    Funcionario,
    Unidade
};

class EditFuncionarios extends Component
{
    public $nome = '';
    public $email = '';
    public $data_nascimento = '';
    public $idade = '';
    public $documento = '';
    public $unidade_id = '';
    public $endereco_id = '';

    public $cep = '';
    public $rua = '';
    public $numero = '';
    public $complemento = '';
    public $bairro = '';
    public $cidade = '';
    public $estado = '';

    public $funcionario = '';

    protected $rules = [
        'nome' => 'required|min:3|max:255',
        'email' => 'required|min:5|max:255',
        'data_nascimento' => 'required',
        'idade' => 'required',
        'documento' => 'required|max:11',
        'unidade_id' => 'required',
        'cep' => 'required|max:8',
        'rua' => 'required|min:3|max:255',
        'numero' => 'required',
        'complemento' => 'max:255',
        'bairro' => 'required|min:3|max:255',
        'cidade' => 'required|min:3|max:255',
        'estado' => 'required|max:255',
    ];
    public function render()
    {
        $unidades = Unidade::get(['id', 'cnpj']);
        $funcionarios = Funcionario::get(['id', 'nome', 'documento', 'unidade_id']);
        return view(
            'livewire.edit-funcionarios',
            [
                'unidades' => $unidades,
                'funcionarios' => $funcionarios,
            ]
        );
    }
    public function atualizarpagina()
    {
        return Redirect::route('edit-funcionarios');
    }
    public function verificar()
    {
        $busca = DB::table('funcionarios')->where('id', $this->funcionario);
        $this->endereco_id = $busca->value('endereco_id');
        $busca_endereco = DB::table('enderecos')->where('id', $this->endereco_id);
        $this->nome = $busca->value('nome');
        $this->email = $busca->value('email');
        $this->data_nascimento = $busca->value('data_nascimento');
        $this->idade = $busca->value('idade');
        $this->documento = $busca->value('documento');
        $this->unidade_id = $busca->value('unidade_id');


        $this->cep = $busca_endereco->value('cep');
        $this->rua = $busca_endereco->value('rua');
        $this->numero = $busca_endereco->value('numero');
        $this->complemento = $busca_endereco->value('complemento');
        $this->bairro = $busca_endereco->value('bairro');
        $this->cidade = $busca_endereco->value('cidade');
        $this->estado = $busca_endereco->value('estado');
    }
    public function buscacep()
    {
        $url = 'viacep.com.br/ws/' . $this->cep . '/json/';
        $response = Http::get($url);
        $respostaapi = $response->json();
        $respostaerro = array_key_exists('erro', $respostaapi);
        if ($respostaerro != TRUE) {
            $this->rua = $respostaapi['logradouro'];
            $this->bairro = $respostaapi['bairro'];
            $this->cidade = $respostaapi['localidade'];
            $this->estado = $respostaapi['uf'];
        } else {
            return Redirect::route('create-funcionarios')->with('status', 'sem-cep');
        }
    }
    public function edit()
    {
        $this->validate();
        $busca_endereco = DB::table('enderecos')->where('id', $this->endereco_id);
        $busca_endereco->update([
            'cep' => $this->cep,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
        ]);
        $ultimo_cadastro = Funcionario::find($this->funcionario);
        $ultimo_cadastro->update([
            'nome' => $this->nome,
            'email' => $this->email,
            'data_nascimento' => $this->data_nascimento,
            'idade' => $this->idade,
            'documento' => $this->documento,
            'unidade_id' => $this->unidade_id,
            'endereco_id' => $this->endereco_id,
            'user_id' => '1',
            //'user_id' => auth()->user()->id,
        ]);
        return Redirect::route('edit-funcionarios')->with('status', 'concluida');
    }
}
