<?php
 
  namespace App\services;

use Illuminate\Http\JsonResponse;

  class ApiResponse
  {
     
    //respostas de sucesso 

      public static function success($data):JsonResponse
      {
         return response()->json(
            [
               'status_code'=> 200,
               'message' => 'success',
               'data' => $data     
            ],200
        );
      }


      //respostas de erro no servidor 

      public static function error($message):JsonResponse
      {
         return response()->json(
            [
               'status_code'=> 500,
               'message' => $message,    
            ],500
        );
      }


      public static function unauthorized():JsonResponse
      {
         return response()->json(
            [
               'status_code'=> 403,
               'message' => 'sem autorização' 
            ],403
        );
      }





  }


 

?>