<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Models\Client;
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

//rota para logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//para poder testar o token abilities eu preciso trazer as rotas associdas pra esse arquivo 

Route::get('/clients',[ClientController::class,'index'])->middleware(['auth:sanctum','ability:clients:list']);
Route::post('/clients',[ClientController::class,'store'])->middleware(['auth:sanctum','ability:clients:create']);
Route::get('/clients/{client}',[ClientController::class,'show'])->middleware(['auth:sanctum','ability:clients:view']);
Route::put('/clients/{client}',[ClientController::class,'update'])->middleware(['auth:sanctum','ability:clients:update']);
Route::delete('/clients/{client}',[ClientController::class,'destroy'])->middleware(['auth:sanctum','ability:clients:delete']);


