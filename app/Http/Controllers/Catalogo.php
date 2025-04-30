<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Catalogo extends Controller{
    public function inicio(){
        return view("pages.inicio",["titulo"=>"Inicio"]);
    }
    public function listado_peliculas(){
        return view("pages.listado_peliculas",["titulo"=>"Lista Peliculas"]);
    }
    public function agregar(){
        return view("pages.agregar",["titulo"=>"Agregar"]);
    }
    public function editar(){
        return view("pages.editar",["titulo"=>"editar"]);
    }
}
