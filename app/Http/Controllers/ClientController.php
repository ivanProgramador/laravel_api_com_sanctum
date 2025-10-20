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
        //
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
