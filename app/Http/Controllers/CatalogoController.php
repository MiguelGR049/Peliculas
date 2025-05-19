<?php

namespace App\Http\Controllers;
use App\Models\Catalogo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CatalogoController extends Controller{
    public function inicio(){
        $sesionUsuario = session('sesionUsuario');

        if($sesionUsuario == ""){
            return view("pages.login",["titulo"=>"login"]);
        }else{
            return view("pages.inicio",["titulo"=>"Inicio"]);
        }
    }

    public function listado_peliculas(){
        $sesionUsuario = session('sesionUsuario');

        if($sesionUsuario == ""){
            return view("pages.login",["titulo"=>"login"]);
        }else{
            $consulta = Catalogo::get();
            /* $consulta = Catalogo::all();
            $consulta = Catalogo::get(); */
            /* $consulta2 = new Catalogo();
            $datos = $consulta2->all(); */
            $datos = $consulta;
            return view("pages.listado_peliculas",["titulo"=>"Lista Peliculas","datos"=>$datos]);
        }
    }
    public function agregar(){
        $sesionUsuario = session('sesionUsuario');

        if($sesionUsuario == ""){
            return view("pages.login",["titulo"=>"login"]);
        }else{
            return view("pages.agregar",["titulo"=>"Agregar"]);
        }
    }
    public function editar(Request $request){
        $sesionUsuario = session('sesionUsuario');

        if($sesionUsuario == ""){
            return view("pages.login",["titulo"=>"login"]);
        }else{
            $consulta = Catalogo::where("id",$request->id)->first();
            return view("pages.editar",["titulo"=>"Editar Pelicula","pelicula"=>$consulta]);
        }
    }

    public function actualizar(Request $request, Catalogo $pelicula){
        request()->validate([
            "titulo"=> "required|string",
            "descripcion"=> "required|string",
            "genero"=> "required|string",
            "director"=> "required|string",
            "fecha_estreno"=> "required|date|date_format:Y-m-d"
        ],
        [
            "titulo.required"=>"El titulo es obligatorio",
            "descripcion.required"=>"La descripcion es obligatoria",
            "genero.required"=>"El genero es obligatorio",
            "director.required"=>"El director es obligatorio",
            "fecha_estreno.required"=>"La fecha de estreno es obligatoria",
            "fecha_estreno.date_format"=> "La fecha de estreno no es válida",
        ]);
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->genero = $request->genero;
        $pelicula->director = $request->director;
        $pelicula->fecha_estreno = $request->fecha_estreno;
        $pelicula->save();
        return redirect()->route("listado_peliculas");
    }
    public function insertar_pelicula(Request $request, Catalogo $pelicula){
        request()->validate([
            "titulo"=> "required|string",
            "descripcion"=> "required|string",
            "genero"=> "required|string",
            "director"=> "required|string",
            "fecha_estreno"=> "required|date"
        ],
        [
            "titulo.required"=>"El titulo es obligatorio",
            "descripcion.required"=>"La descripcion es obligatoria",
            "genero.required"=>"El genero es obligatorio",
            "director.required"=>"El director es obligatorio",
            "fecha_estreno.required"=>"La fecha de estreno es obligatoria"
        ]);
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->genero = $request->genero;
        $pelicula->director = $request->director;
        $pelicula->fecha_estreno = $request->fecha_estreno;
        $pelicula->save();
        return redirect()->route("listado_peliculas");
    }
    public function eliminar_pelicula(Request $request, Catalogo $pelicula){
        $pelicula = Catalogo::where("id",$request->id)->first();
        $pelicula->delete();
        return redirect()->route("listado_peliculas");
    }
}
