<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Inicio extends Controller
{
    //
    public function categoria(){
        $categorias = App\Categoria::all();
        return view('Principal.categoria',compact('categorias'));
    }
    public function social(){
        return view('Principal.social');
    }
    public function ctrlcategoria(){
        return view('Principal.categoria');
    }
    public function realizarpedido(){
        $producto = App\Producto::all();
        $catalogo = App\Catalogo::all();
        $detalle = App\Detalle::all();
        $users = App\User::all();
        $pedido = App\Pedido::all();
        return view('Principal.realizarpedido',compact('catalogo','producto','users','detalle','pedido'));
    }
    public function verpedido(){
        
        return view('Principal.pedidoempresaria');
    }
    public function buscarpto(Request $request){
        //return $request->all();
        $productop = App\Producto::where ("nombre","like",$request->id)->get();
        return view('Principal.realizarpedido',compact('productop'));
    }
    public function agregardetalle(Request $request){
        //return $request->all();
        $pedidonuevo=new App\Detalle;
        $pedido=$request->id_pedido;
        $pedidonuevo->pedido_id=$request->id_pedido;
        $pedidonuevo->producto_id=$request->codProducto;
        $pedidonuevo->talla=$request->talla;
        $pedidonuevo->color=$request->color;
        $pedidonuevo->cantidad=$request->cantidad;
        $pedidonuevo->total=$request->total;
        $pedidonuevo->save();
        return back()->with ('idpedido',$pedido);
    }
    public function eliminar(Request $request){
        //return $request->all();
        $idnueva=$request->did;
        $catalogo= App\Detalle::find($idnueva);
        $catalogo->delete();
        return back();
    }
    public function agregarpedido(Request $request){
        //return $request->all();
        $pedidonuevo=new App\Pedido;
        $pedidonuevo->cliente_id=$request->idcliente;
        $pedidonuevo->empresaria_id=$request->id_empresaria;
        $pedidonuevo->fecha=$request->fecha;
        $pedidonuevo->total=$request->totalPedido;
        $pedidonuevo->estado='';
        $pedidonuevo->save();
        return back();
    }

    
}
