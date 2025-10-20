<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/status',function(){
    return response()->json(
        [
            'status' => 'ok',
            'message' => 'API funcionando'
        ],200
    );
});

//so o fato de digitar essa linha ja cria todas as rotas para o controlador ClientController
//baseado nos metodos que ele ja possui

Route::apiResource('clients', ClientController::class);