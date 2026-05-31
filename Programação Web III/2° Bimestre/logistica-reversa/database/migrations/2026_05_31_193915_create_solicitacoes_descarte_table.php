<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitacoes_descarte', function (Blueprint $table) {
            $table->id();
            $table->string('nome_usuario');
            $table->string('tipo_eletronico');
            $table->string('modelo')->nullable();
            $table->text('descricao_estado');
            $table->string('ponto_coleta');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitacoes_descarte');
    }
};
