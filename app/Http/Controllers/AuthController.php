<?php

namespace App\Http\Controllers;

use App\services\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //validando os dados 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        
        //depois da validação pegar os dados o colocar nas variaveis

        $email = $request->input('email');
        $password = $request->input('password');

        //tentando autenticar o usuario
        //aqui estou tentando autenticar o usuario com os dados fornecidos
        //perguntando se ele existe no banco de dados com a senha que foi fornecida

        $attempt = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);
        

        //se nao conseguir autenticar retorna uma mensagem de erro

        if (!$attempt) {
            return ApiResponse::unauthorized();
        }

        //se conseguir autenticar gera um token para o usuario

        $user = auth()->user();
        $token = $user->createToken($user->name)->plainTextToken;
         
        //retorna o token para o usuario
        
        return ApiResponse::success(
            [
                "name"=> $user->name,
                "email"=>$user->email,
                "token"=>$token
            ]
        );
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ApiResponse::success('logout feito com sucesso!');

    }


}
