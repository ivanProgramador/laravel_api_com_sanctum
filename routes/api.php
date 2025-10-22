<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\services\ApiResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/status',function(){
    return ApiResponse::success('Api funcionando');
})->middleware('auth:sanctum');

//so o fato de digitar essa linha ja cria todas as rotas para o controlador ClientController
//baseado nos metodos que ele ja possui

Route::apiResource('clients', ClientController::class)->middleware('auth:sanctum');

//rota para login
Route::post('/login', [AuthController::class, 'login']);
