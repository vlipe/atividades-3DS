<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// ALGORITMO: Rota principal (Home) que carrega a interface de boas-vindas do GreenLoop
Route::get('/', function () {
    return view('home');
})->name('home');

// ALGORITMO: Rota que renderiza o formulário de captação de resíduos eletrônicos
Route::get('/descarte/novo', function () {
    return view('formulario');
})->name('descarte.form');

// ALGORITMO: Rota do tipo POST responsável por processar e salvar os dados do formulário
Route::post('/descarte/salvar', function (Request $request) {

    // Comentário no Algoritmo: Camada de validação para garantir que os campos obrigatórios
    // cheguem preenchidos e no formato correto antes de tocar no banco de dados.
    $request->validate([
        'nome_usuario' => 'required|string|max:255',
        'tipo_eletronico' => 'required|string',
        'descricao_estado' => 'required|string',
        'ponto_coleta' => 'required|string',
    ]);

    // Comentário no Algoritmo: Utilização da Facade DB (Query Builder) para inserir os dados
    // sanitizados diretamente na tabela criada via Migration, registrando também o timestamp atual.
    DB::table('solicitacoes_descarte')->insert([
        'nome_usuario' => $request->nome_usuario,
        'tipo_eletronico' => $request->tipo_eletronico,
        'modelo' => $request->modelo,
        'descricao_estado' => $request->descricao_estado,
        'ponto_coleta' => $request->ponto_coleta,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Comentário no Algoritmo: Redirecionamento seguro para a rota de sucesso para evitar
    // o reenvio duplicado de dados caso o usuário atualize a página (padrão Post-Redirect-Get).
    return redirect()->route('descarte.sucesso');
})->name('descarte.salvar');

// ALGORITMO: Rota que exibe a tela de confirmação e recupera os dados para a listagem
Route::get('/descarte/sucesso', function () {

    // Comentário no Algoritmo: Consulta o banco de dados trazendo todos os registros
    // ordenados do mais recente para o mais antigo, enviando a coleção para a View.
    $descartes = DB::table('solicitacoes_descarte')->orderBy('created_at', 'desc')->get();
    return view('sucesso', compact('descartes'));
})->name('descarte.sucesso');


// ==========================================
// REQUISITO OBRIGATÓRIO: ROTA FALLBACK
// ==========================================
// Comentário no Algoritmo: Este método funciona como um "pega-tudo". Se o usuário digitar
// uma URL que não existe, o Laravel cai aqui e renderiza uma página de erro 404 customizada.
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
