<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContaPagar extends Model
{
    use HasFactory;

    protected $table = 'contas_pagar';

    protected $fillable = [
        'funcionario_id',
        'descricao',
        'valor',
        'data_vencimento',
        'status'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}

