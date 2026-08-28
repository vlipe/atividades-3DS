<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;
use App\Http\Middleware\VerificaAcesso; 

Route::get('/portal', [PortalController::class, 'index'])
    ->middleware(VerificaAcesso::class);