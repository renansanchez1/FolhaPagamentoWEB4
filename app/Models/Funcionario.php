<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'cargo',
        'salario',
        'data_admissao'
    ];

    public function contasPagar()
    {
        return $this->hasMany(ContaPagar::class);
    }

    public function ocorrencias()
    {
        return $this->hasMany(Ocorrencia::class);
    }
}
