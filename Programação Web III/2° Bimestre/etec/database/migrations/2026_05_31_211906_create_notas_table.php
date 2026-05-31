<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a criação da tabela de notas.
     */
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            // ALGORITMO: Cria uma chave estrangeira vinculada à tabela de usuários (Alunos)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('componente_curricular'); // Ex: Desenvolvimento de Sistemas, Banco de Dados
            $table->decimal('nota_p1', 4, 2); // Nota da primeira avaliação
            $table->decimal('nota_p2', 4, 2); // Nota da segunda avaliação
            $table->decimal('media', 4, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
