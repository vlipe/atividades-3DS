<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// VIEW HOME
Route::get('/', function () {
    return view('home');
})->name('home');

// VIEW CURSOS
Route::get('/cursos', function () {
    return view('cursos');
})->name('cursos');

// VIEW EVENTOS
Route::get('/eventos', function () {
    return view('eventos');
})->name('eventos');

// VIEW FORMULÁRIO (Contato / Pré-inscrição)
Route::get('/contato', function () {
    return view('contato');
})->name('contato.form');

// Processamento do Formulário Público com Proteção CSRF
Route::post('/contato/enviar', function (Request $request) {
    // Comentário no Algoritmo: Validação básica dos dados de contato recebidos
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email',
        'mensagem' => 'required|string',
    ]);

    return redirect()->back()->with('sucesso', 'Mensagem enviada com sucesso!');
})->name('contato.enviar');


// Comentário no Algoritmo: O middleware 'auth' garante que apenas usuários logados
// acessem o dashboard de visualização de notas.
Route::get('/dashboard', function () {
    // Busca as notas vinculadas ao ID do usuário autenticado
    $notas = DB::table('notas')->where('user_id', auth()->id())->get();
    return view('dashboard', compact('notas'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Comentário no Algoritmo: Captura qualquer tentativa de acesso a rotas que não existem
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

require __DIR__.'/auth.php';
