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
        //mosttando um cliente especifico

        $client = Client::find($id);
        if (!$client) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }else {
            return response()->json($client, 200);
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

            return response()->json([
                'message' => 'Cliente atualizado com sucesso',
                'data' => $client
            ], 200);

           

        }else {

             return response()->json(['message' => 'Cliente não encontrado'], 404);
        }    





    }

   
    public function destroy(string $id)
    {
        $client = Client::find($id);

        if($client){
            $client->delete();
            return response()->json([
                'message'=>'cliente deletado com sucesso'
            ],200);
        }else{
             return response()->json([
                'message'=>'cliente não econtrado'
            ],404);
             
        }
    }
}
