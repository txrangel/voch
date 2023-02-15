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
};
class DeleteFuncionarios extends Component
{
    public $funcionario= '';
    protected $rules = [
        'funcionario' => 'required',
    ];
    public function render()
    {
        $funcionarios = Funcionario::get(['id','documento']);
        return view(
            'livewire.delete-funcionarios',
            [
                'funcionarios' => $funcionarios,
            ]
        );
    }
    public function atualizarpagina(){
        return Redirect::route('delete-funcionarios');
    }
    public function delete(){
        $this->validate();
        $endereco_id = DB::table('funcionarios')->where('id', $this->funcionario)->value('endereco_id');
        $ultimo_cadastro = Funcionario::where('id',$this->funcionario)->delete();
        Endereco::where('id',$endereco_id)->delete();
        return Redirect::route('delete-funcionarios')->with('status', 'concluida');
    }
}
