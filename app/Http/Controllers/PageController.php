<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PageController extends Controller
{
    public function inicio(){
        return view('home');
    }

    public function administrar(){
        $categorias = App\Categoria::all();
        return view('administrador',compact('categorias'));
    }
    public function agregar(Request $request){
        //return $request->all();
        $categoriasnueva=new App\Categoria;
        $categoriasnueva->nombre=$request->nombre;
        $categoriasnueva->detalle=$request->detalle;
        $categoriasnueva->nbusquedas=0;
        $categoriasnueva->save();
        return back()->with ('mensaje','Categoría agregada');
    }
    public function eliminar(Request $request){
        //return $request->all();
        $idnueva=$request->did;
        $categorias= App\Categoria::find($idnueva);
        $categorias->delete();
        return back()->with ('mensaje','Categoría eliminada');
    }
    public function editar(Request $request){
        //return $request->all();
        $idnueva=$request->mid;
        $categoriaedit= App\Categoria::find($idnueva);
        $categoriaedit->nombre=$request->nombrem;
        $categoriaedit->detalle=$request->detallem;
        $categoriaedit->save();
        return back()->with ('mensaje','Categoría modificada');
    }

    //CLIENTES
    public function cliente(){
        $users = App\User::all();
        return view('clientes',compact('users'));
    }
    public function eliminarcli(Request $request){
        //return $request->all();
        $idnueva=$request->did;
        $cliente= App\User::find($idnueva);
        $cliente->delete();
        return back()->with ('mensaje','Cliente eliminado');
    }
    public function editarcli(Request $request){
        //return $request->all();
        $idnueva=$request->mid;
        $clienteedit= App\User::find($idnueva);
        $clienteedit->role_id=$request->optradio;
        $clienteedit->save();
        return back()->with ('mensaje','Cliente modificado');
    }

    //CATALOGO
    public function catalogo(){
        $catalogo = App\Catalogo::all();
        $categoria = App\Categoria::all();
        return view('catalogo',compact('catalogo','categoria'));
    }
    public function agregarctgo(Request $request){
        //return $request->all();
        $catalogonuevo=new App\Catalogo;
        $catalogonuevo->nombre=$request->nombre;
        $catalogonuevo->categoria_id=$request->categoria_id;
        $catalogonuevo->descripcion=$request->descripcion;
        $catalogonuevo->enlace=$request->enlace;
        $catalogonuevo->inicioFact=$request->inicioFact;
        $catalogonuevo->finFact=$request->finFact;
        $catalogonuevo->ganancia=0;
        $catalogonuevo->archivo=$request->archivo;
        $catalogonuevo->save();
        return back()->with ('mensaje','Catálogo agregado');
    }
    public function eliminarctgo(Request $request){
        //return $request->all();
        $idnueva=$request->did;
        $catalogo= App\Catalogo::find($idnueva);
        $catalogo->delete();
        return back()->with ('mensaje','Catálogo eliminado');
    }
    public function editarctgo(Request $request){
        //return $request->all();
        
        $idnueva=$request->mid;
        $catalogonew= App\Catalogo::find($idnueva);
        $catalogonew->nombre=$request->tnombre;
        $catalogonew->categoria_id=$request->tcategoria_id;
        $catalogonew->descripcion=$request->tdescripcion;
        $catalogonew->enlace=$request->tenlace;
        $catalogonew->inicioFact=$request->tinicioFact;
        $catalogonew->finFact=$request->tfinFact;
        $catalogonew->archivo=$request->tarchivo;
        $catalogonew->save();
        return back()->with ('mensaje','Catálogo modificado');
    }

        //PRODUCTO
        public function producto(){
            $catalogo = App\Catalogo::all();
            $producto = App\Producto::all();
            return view('producto',compact('catalogo','producto'));
        }
        public function agregarpto(Request $request){
            //return $request->all();
            $productonuevo=new App\Producto;
            $productonuevo->nombre=$request->nombre;
            $productonuevo->catalogo_id=$request->catalogo_id;
            $productonuevo->tamano=$request->tamano;
            $productonuevo->color=$request->color;
            $productonuevo->precio=$request->precio;
            $productonuevo->ganancia=$request->ganancia;
            $productonuevo->descripcion=$request->descripcion;
            $productonuevo->save();
            return back()->with ('mensaje','Producto agregado');
        }
        public function eliminarpto(Request $request){
            //return $request->all();
            $idnueva=$request->did;
            $producto= App\Producto::find($idnueva);
            $producto->delete();
            return back()->with ('mensaje','Producto eliminado');
        }
        public function editarcpto(Request $request){
            //return $request->all();
            $idnueva=$request->mid;
            $productonuevo= App\Producto::find($idnueva);
            $productonuevo->nombre=$request->pnombre;
            $productonuevo->catalogo_id=$request->pcatalogo_id;
            $productonuevo->tamano=$request->ptamano;
            $productonuevo->color=$request->pcolor;
            $productonuevo->precio=$request->pprecio;
            $productonuevo->ganancia=$request->pganancia;
            $productonuevo->descripcion=$request->pdescripcion;
            $productonuevo->save();
            return back()->with ('mensaje','Producto modificado');
        }

    
}
