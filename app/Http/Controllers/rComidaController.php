<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productos;

class rComidaController extends Controller
{
    public function index()
    {

    	$productos = productos::all();
		return view('ver_comida');


    }
public function register(Request $request)
{

    $productos = new productos();

    $productos->name = $request->input('name');
    $productos->cantidad = $request->input('cantidad');
    $productos->descripcion = $request->input('descripcion');
    $productos->save();
   
    // return redirect()->route('ver_comida');
}

public function ver(Request $request){
	$productos = productos::all();
    $data = $productos->toJson();
    return $data;

}
  public function update(Request $request)    {
        //
        $this->validate($request,[ 'name'=>'required', 'cantidad'=>'required', 'descripcion'=>'required']);
 
        productos::find($id)->update($request->all());
        $response= 'Se a guardado con exito';
        return $response;
 
    }


}
