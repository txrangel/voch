<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'data_nascimento',
        'idade',
        'documento',
        'unidade_id',
        'endereco_id',
    ];

    public function unidade(){
        return $this->belongsTo(Unidade::class);
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
