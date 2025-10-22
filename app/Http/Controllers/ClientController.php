<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\services\ApiResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
   
    public function index()
    {
        //Mostrando todos os clientes 
        //aqui eu faço um select de todos os clientes 
        //e depois faço um conversão para json e retorno o status 200
        //em uma linha so 
        
        return ApiResponse::success(Client::all());

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

        return ApiResponse::success($client);
    }

   
    public function show(string $id)
    {
        //mostrando um cliente especifico

        $client = Client::find($id);

        if ($client) {
            return ApiResponse::success($client);
        }else {
            return ApiResponse::error("Cliente não encotrado");
        }

    }

    
    public function update(Request $request, string $id)
    {
        //validando a requisição 
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,'.$id,
            'phone' => 'required',
        ]);

        //atualizando um cliente especifico
        $client = Client::find($id);

        if ($client) {

            $client->update($request->all());

            return ApiResponse::success($client); 

        }else {

             return ApiResponse::error("Cliente não encontrado");
        }    





    }

   
    public function destroy(string $id)
    {
        $client = Client::find($id);

        if($client){
            $client->delete();
            return ApiResponse::success('cliente deletado com sucesso');
        }else{
             return ApiResponse::error('cliente não encontrado');
             
        }
    }
}
