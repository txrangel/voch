<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Unidade
};
use Illuminate\Support\Facades\{
Redirect,
Mail,
DB
};

class EditUnidades extends Component
{

    public $unidade= '';
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
        $unidades = Unidade::get(['id','cnpj','razao_social']);
        return view('livewire.edit-unidades',
        [
            'unidades' => $unidades,
        ]);
    }
    public function verificar(){
        $this->razao_social = DB::table('unidades')->where('id', $this->unidade)->value('razao_social');
        $this->nome_fantasia= DB::table('unidades')->where('id', $this->unidade)->value('nome_fantasia');
        $this->cnpj= DB::table('unidades')->where('id', $this->unidade)->value('cnpj');
    }
    public function edit(){
        $this->validate();
        $ultimo_cadastro = Unidade::find($this->unidade);
        $ultimo_cadastro->update(['razao_social' => $this->razao_social,'cnpj' => $this->cnpj,'nome_fantasia' => $this->nome_fantasia]);
        //Mail::to(auth()->user()->email)->bcc('joaovitorrtd@gmail.com')->send(new ReservaSalas($ultimo_cadastro));
        return Redirect::route('edit-unidades')->with('status', 'concluida');
    }
}
