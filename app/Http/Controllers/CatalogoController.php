<?php

namespace App\Http\Controllers;
use App\Models\Catalogo;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CatalogoController extends Controller{
    public function inicio(){
        return view("pages.inicio",["titulo"=>"Inicio"]);
    }
    public function login(){
        return view("pages.login",["titulo"=>"Login"]);
    }
    public function registro(){
        return view("pages.registro",["titulo"=>"Registro"]);
    }

    public function insertar_usuario(Request $request, Usuario $usuario){
        request()->validate([
            "nombre"=> "required|string|regex:/^[A-Z]{1}[a-z]+$/",
            "apellido"=> "required|string|regex:/^[A-Z]{1}[a-z]+$/",
            "usuario"=> "required|string|regex:/^[A-Za-z0-9]+$/",
            "email"=> "required|string|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z]{2,}$/i",
            "password"=> "required|string"
        ],
        [
            "nombre.regex"=>"El nombre solo puede contener letras y debe empezar con mayúscula",
            "apellido.regex"=>"El apellido solo puede contener letras y debe empezar con mayúscula",
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $request->usuario;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        try{
            $usuario->save();
            return redirect()->route("login");
        }catch(Exception $e){
            throw ValidationException::withMessages(["usuario"=> "usuario ya existe"]);
        }
    }
    public function login_usuario(Request $request){
        $consulta = Usuario::where("usuario",$request->usuario)->first();
        if($consulta){
            if(password_verify($request->password,$consulta->password)){
                session()->put("usuario",$consulta->usuario);
                session()->put("id",$consulta->id);
                return redirect()->route("inicio");
            }else{
                return redirect()->route("login")->withMessages(["password"=>"Contraseña incorrecta"]);
            }
        }else{
            return redirect()->route("login")->withMessages(["usuario"=>"Usuario no encontrado"]);
        }
    }


    public function listado_peliculas(){
        $consulta = Catalogo::get();
        /* $consulta = Catalogo::all();
        $consulta = Catalogo::get(); */
        /* $consulta2 = new Catalogo();
        $datos = $consulta2->all(); */
        $datos = $consulta;
        return view("pages.listado_peliculas",["titulo"=>"Lista Peliculas","datos"=>$datos]);
    }
    public function agregar(){
        return view("pages.agregar",["titulo"=>"Agregar"]);
    }
    public function editar(Request $request){
        $consulta = Catalogo::where("id",$request->id)->first();
        return view("pages.editar",["titulo"=>"Editar Pelicula","pelicula"=>$consulta]);
    }
    public function actualizar(Request $request, Catalogo $pelicula){
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->genero = $request->genero;
        $pelicula->director = $request->director;
        $pelicula->fecha_estreno = $request->fecha_estreno;
        $pelicula->save();
        return redirect()->route("listado_peliculas");
    }
    public function insertar_pelicula(Request $request, Catalogo $pelicula){
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
