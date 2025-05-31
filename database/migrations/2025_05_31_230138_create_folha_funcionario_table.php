<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolhaFuncionarioTable extends Migration
{
    public function up()
    {
        Schema::create('folha_funcionario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('folha_pagamento_id')->constrained('folha_pagamentos')->onDelete('cascade');
            $table->foreignId('funcionario_id')->constrained()->onDelete('cascade');
            $table->decimal('salario_base', 10, 2);
            $table->decimal('adicionais', 10, 2)->default(0);
            $table->decimal('descontos', 10, 2)->default(0);
            $table->decimal('contas_pagar', 10, 2)->default(0);
            $table->decimal('salario_liquido', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('folha_funcionario');
    }
}
