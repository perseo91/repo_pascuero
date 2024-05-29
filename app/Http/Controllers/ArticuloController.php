<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    //
    public function mostrarCatalogo(){
        $articulos=Articulo::all();
        return view('articulos.index',['articulos'=>$articulos]);
    }
    public function ingresarArticulo(Request $request){
        $request->validate(['nombre'=>'required|min:3','imagen'=>'required',
        'descripcion'=>'required|min:5','precio'=>'required']);
        $articulo=new Articulo;
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $rutadestino='imagenes/articulos/';
            $filename=time().'-'.$file->getClientOriginalName();
            $subida=$request->file('imagen')->move($rutadestino,$filename);
            $articulo->imagen=$rutadestino.$filename;
        }
        $articulo->nombre=$request->nombre;
        $articulo->descripcion=$request->descripcion;
        $articulo->precio=$request->precio;
        $articulo->save();
        return redirect()->route('articulos')->with('success','Articulo almacenado con exito');
        

    }
}
