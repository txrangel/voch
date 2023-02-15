<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Endereco,
    Funcionario,
    Unidade
};
use Illuminate\Support\Facades\{
    Redirect,
    Mail,
    Http,
    DB
};
class CreateFuncionarios extends Component
{
    public $nome = '';
    public $email= '';
    public $data_nascimento= '';
    public $idade = '';
    public $documento= '';
    public $unidade_id= '';
    public $endereco_id= '';

    public $cep='';
    public $rua='';
    public $numero='';
    public $complemento='';
    public $bairro='';
    public $cidade='';
    public $estado='';

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
        $unidades = Unidade::get(['id','cnpj']);
        $funcionarios = Funcionario::get(['id','nome','documento','unidade_id']);
        return view('livewire.create-funcionarios',
        [
            'unidades' => $unidades,
            'funcionarios' => $funcionarios,
        ]);
    }
    public function buscacep(){
        $url = 'viacep.com.br/ws/'. $this->cep .'/json/';
        $response = Http::get($url);
        $respostaapi = $response->json();
        $respostaerro = array_key_exists('erro', $respostaapi);
        if($respostaerro != TRUE){    
            $this->rua= $respostaapi['logradouro'];
            $this->bairro= $respostaapi['bairro'];
            $this->cidade= $respostaapi['localidade'];
            $this->estado= $respostaapi['uf'];
        }else{
            return Redirect::route('create-funcionarios')->with('status', 'sem-cep');
        }
    }
    public function atualizarpagina(){
        return Redirect::route('create-funcionarios');
    }
    public function create(){
        $this->validate();
        $query = "select id from voch.funcionarios where documento = ?";
        if(!(DB::select($query, [$this->documento]))){
            $this->endereco_id = Endereco::create([
                'cep' => $this->cep,
                'rua' => $this->rua,
                'numero' => $this->numero,
                'complemento' => $this->complemento,
                'bairro' => $this->bairro,
                'cidade' => $this->cidade,
                'estado' => $this->estado,
            ]);
            $ultimo_cadastro = Funcionario::create([
                'nome' => $this->nome,
                'email' => $this->email,
                'data_nascimento' => $this->data_nascimento,
                'idade' => $this->idade,
                'documento' => $this->documento,
                'unidade_id' => $this->unidade_id,
                'endereco_id' => $this->endereco_id->id,
                'user_id' => '1',
                //'user_id' => auth()->user()->id,
            ]);
            //Mail::to(auth()->user()->email)->bcc('joaovitorrtd@gmail.com')->send(new ReservaSalas($ultimo_cadastro));
            return Redirect::route('create-funcionarios')->with('status', 'concluida');
        }else{
            return Redirect::route('create-funcionarios')->with('status', 'negada-existente');
        }
    }
}
