<?php

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
