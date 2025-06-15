<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ocorrencia_folha_pagamento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ocorrencia_id')->constrained()->onDelete('cascade');
            $table->foreignId('folha_pagamento_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ocorrencia_folha_pagamento');
    }
};
