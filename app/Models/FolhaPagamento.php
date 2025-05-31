<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolhaPagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'competencia',
        'valor_total',
        'data_geracao'
    ];

    public function ocorrencias()
    {
        return $this->belongsToMany(Ocorrencia::class, 'ocorrencia_folha_pagamento');
    }

    public function funcionarios()
{
    return $this->hasMany(FolhaFuncionario::class, 'folha_pagamento_id');
}

}
