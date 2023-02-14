<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Unidade
};
use Illuminate\Support\Facades\{
Redirect,
Mail
};
class CreateUnidades extends Component
{
    public $razao_social = '';
    public $nome_fantasia= '';
    public $cnpj= '';

    protected $rules = [
        'cnpj' => 'required|min:1|max:14',
        'nome_fantasia' => 'required|min:3|max:255',
        'razao_social' => 'required|min:3|max:255',
    ];
    public function render()
    {
        $unidades = Unidade::get(['id','cnpj','razao_social','nome_fantasia']);
        return view('livewire.create-unidades',
        [
            'unidades' => $unidades,
        ]);
        
    }

    public function create(){
        $this->validate();
        if(!(Unidade::where('cnpj', $this->cnpj)->value('razao_social'))){
            $ultimo_cadastro = Unidade::create([
                'nome_fantasia' => $this->nome_fantasia,
                'razao_social' => $this->razao_social,
                'cnpj' => $this->cnpj,
                //'user_id' => auth()->user()->id,
            ]);
            //Mail::to(auth()->user()->email)->bcc('joaovitorrtd@gmail.com')->send(new ReservaSalas($ultimo_cadastro));
            return Redirect::route('create-unidades')->with('status', 'concluida');
        }else{
            return Redirect::route('create-unidades')->with('status', 'negada-existente');
        } 
    }
}
