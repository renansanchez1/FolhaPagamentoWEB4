<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'funcionario_id',
        'descricao',
        'tipo',
        'valor',
        'data'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function folhasPagamento()
    {
        return $this->belongsToMany(FolhaPagamento::class, 'ocorrencia_folha_pagamento');
    }
}
