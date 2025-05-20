@extends('plantilla')

@section('contenido')
@include('components/navbar')
<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        <div class="col mb-4 text-center">
            <form method="post" action="{{route('actualizar',$pelicula->id)}}" class="row mt-5 justify-content-center">
                @method('PUT')
                @csrf
                <div class="card justify-content-center" style="width: 25rem; background-color: rgba(255, 255, 255, 0.5);">
                    <img class="mx-auto d-block" src="{{ asset('img/Itadori.png') }}" height="95" width="125px">
                    <div class="card-body row justify-content-center">

                        <h1 class="fw-bold text-center">Editar</h1>

                        <label class="fw-bold" for="titulo">Titulo</label>
                        <input name="titulo" id="titulo" class="form-control mb-3" type="text" placeholder="Titulo" value="{{$pelicula->titulo}}">
                        @error('titulo')
                        <p>{{$message}}</p>
                        @enderror

                        <label class="fw-bold" for="descripcion">Descripcion</label>
                        <input name="descripcion" id="descripcion" class="form-control mb-3" type="text" placeholder="Descripcion" value="{{$pelicula->descripcion}}">
                        @error('descripcion')
                        <p>{{$message}}</p>
                        @enderror

                        <label class="fw-bold" for="genero">Genero</label>
                        <input name="genero" id="genero" class="form-control mb-3" type="text" placeholder="Genero" value="{{$pelicula->genero}}">
                        @error('genero')
                        <p>{{$message}}</p>
                        @enderror

                        <label class="fw-bold" for="director">Director</label>
                        <input name="director" id="director" class="form-control mb-3" type="text" placeholder="Director" value="{{$pelicula->director}}">
                        @error('director')
                        <p>{{$message}}</p>
                        @enderror

                        <label class="fw-bold" for="fecha_estreno">Fecha Estreno</label>
                        <input name="fecha_estreno" id="fecha_estreno" class="form-control mb-3" type="text" placeholder="" value="{{$pelicula->fecha_estreno}}">
                        @error('fecha_estreno')
                        <p>{{$message}}</p>
                        @enderror

                        <div class="col justify-content-center text-center">
                            <button type="submit" class="btn btn-success mb-2">Actualizar</button>
                            <br>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection