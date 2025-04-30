<?php

namespace App\Http\Controllers;
use App\Models\Catalogo;

use Illuminate\Http\Request;

class CatalogoController extends Controller{
    public function inicio(){
        return view("pages.inicio",["titulo"=>"Inicio"]);
    }
    public function listado_peliculas(){
        $consulta = Catalogo::select("titulo","descripcion")->get();
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
    public function editar(){
        return view("pages.editar",["titulo"=>"editar"]);
    }
}
