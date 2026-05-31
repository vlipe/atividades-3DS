<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Comentário no Algoritmo: Define a estrutura lógica e os tipos de dados da tabela
        // no banco de dados para o gerenciamento da logística reversa.
        Schema::create('solicitacoes_descarte', function (Blueprint $table) {
            $table->id(); // Chave primária auto-incremental
            $table->string('nome_usuario'); // Nome de quem está descartando
            $table->string('tipo_eletronico'); // Categoria do aparelho (ex: Celular, Placa)
            $table->string('modelo')->nullable(); // Campo opcional para marca/modelo
            $table->text('descricao_estado'); // Relato do defeito ou conservação do item
            $table->string('ponto_coleta'); // Destino físico do descarte (Ecoponto)
            $table->timestamps(); // Cria as colunas nativas 'created_at' e 'updated_at'
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitacoes_descarte');
    }
};
