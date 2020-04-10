<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//importar modelo
use App\Productos;
use Log;

class ProductoController extends Controller
{

    public function create(Request $request){

      $input['prod_name'] = $request->input('name'); 
      $input['prod_description'] = $request->input('description'); 
      $input['prod_categoria'] = $request->input('categorie'); 
      $input['prod_price'] = $request->input('price'); 
      
      $input['prod_visible'] = 1;
      $input['prod_delete'] = 0;
      $input['prod_image'] = null;

      if ($request->file('prod_image')==null)
      {
        $input['prod_image'] = null;
      }
      else
      {
        $image = $request->file('prod_image');
        // almacena y captura el nombre del archivo
        $input['prod_image'] =  $image->store('producto','public');
      }

      $data = Productos::insert($input);

      $response['message'] = "Guardo exitosamente ";
      $response['success'] = true;
      return $response;

    }
}