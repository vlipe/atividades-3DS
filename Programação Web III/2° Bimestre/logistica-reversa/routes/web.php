<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/descarte/novo', function () {
    return view('formulario');
})->name('descarte.form');

Route::post('/descarte/salvar', function (Request $request) {

    $request->validate([
        'nome_usuario' => 'required|string|max:255',
        'tipo_eletronico' => 'required|string',
        'descricao_estado' => 'required|string',
        'ponto_coleta' => 'required|string',
    ]);

    DB::table('solicitacoes_descarte')->insert([
        'nome_usuario' => $request->nome_usuario,
        'tipo_eletronico' => $request->tipo_eletronico,
        'modelo' => $request->modelo,
        'descricao_estado' => $request->descricao_estado,
        'ponto_coleta' => $request->ponto_coleta,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('descarte.sucesso');
})->name('descarte.salvar');

Route::get('/descarte/sucesso', function () {

    $descartes = DB::table('solicitacoes_descarte')->orderBy('created_at', 'desc')->get();
    return view('sucesso', compact('descartes'));
})->name('descarte.sucesso');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
