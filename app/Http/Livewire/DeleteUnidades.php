<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Unidade
};
use Illuminate\Support\Facades\{
    Redirect,
};
class DeleteUnidades extends Component
{
    public $unidade= '';
    protected $rules = [
        'unidade' => 'required',
    ];
    public function render()
    {
        $unidades = Unidade::get(['id','cnpj','razao_social']);
        return view('livewire.delete-unidades',
        [
            'unidades' => $unidades,
        ]);
    }
    public function atualizarpagina(){
        return Redirect::route('delete-unidades');
    }
    public function delete(){
        $this->validate();
        $ultimo_cadastro = Unidade::where('id',$this->unidade)->delete();
        return Redirect::route('delete-unidades')->with('status', 'concluida');
    }
}
