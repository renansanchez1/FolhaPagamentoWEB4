<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolhaFuncionario extends Model
{
    use HasFactory;

    protected $table = 'folha_funcionario'; 

    protected $fillable = [
        'folha_pagamento_id',
        'funcionario_id',
        'salario_base',
        'adicionais',
        'descontos',
        'contas_pagar',
        'salario_liquido',
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function folhaPagamento()
    {
        return $this->belongsTo(FolhaPagamento::class);
    }
}
