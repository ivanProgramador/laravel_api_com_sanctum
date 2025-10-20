<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
   
    public function index()
    {
        //Mostrando todos os clientes 
        //aqui eu faço um select de todos os clientes 
        //e depois faço um conversão para json e retorno o status 200
        //em uma linha so 
        
        return response()->json(Client::all(), 200);

    }

 
    public function store(Request $request)
    {
         //no caso desse metodo a rota e a mesma so muda o verbo http
        //aqui eu vou cadastrar um novo cliente 
        //então o verbo é post 

        //validando a requisição 
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required',
        ]);

        //criando um novo cliente
        //essa é uma forma mais rapida de criar um cliente
        //usando o método create do model Client
        //ele recebe um array com os dados do cliente

        $client = Client::create($request->all());

        return response()->json([
            'message' => 'cliente cadastrado com sucesso',
            'data' => $client
        ]);
    }

   
    public function show(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(string $id)
    {
        //
    }
}
