<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('folha_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('competencia'); 
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->date('data_geracao');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folha_pagamentos');
    }
};
