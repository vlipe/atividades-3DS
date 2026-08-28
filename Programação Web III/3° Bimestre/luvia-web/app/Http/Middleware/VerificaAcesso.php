<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificaAcesso
{
    public function handle(Request $request, Closure $next): Response
    {
        return response()->view('acesso_negado');
    }
}