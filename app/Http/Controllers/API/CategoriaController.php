<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorias;

class CategoriaController extends Controller
{
    //

    public function add(Request $request){

      $name = $request->input("name");

      Categorias::insert([
        'cat_nombre' => $name,
        'cat_active' => 1,
        'cat_delete' => 0
      ]);

      $response['message'] = "Guardo exitosamente $name";
      $response['success'] = true;
      return $response;

    }


    public function list(){

      $data = Categorias::where("cat_delete",0)
      ->get();
      return $data;
    }

    public function avalaible(){
      $data = Categorias::where("cat_delete",0)->where("cat_active",1)->get();
      return $data;
    }

    public function change_status(Request $request){

      // id de categoria
      $idcat = $request->input("idcat");
      // el estado de categoria
      $status = $request->input("status");

      Categorias::where("cat_id",$idcat)->update([
        'cat_active' => $status
      ]);

      $response['message'] = "Actualizo exitosamente";
      $response['success'] = true;
      return $response;

    }

}