@extends('plantilla')

@section('contenido')
@include('components/navbar')
<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        <div class="col mt-4 text-center">
            <div class="row justify-content-center">
                <div class="card p-3 rounded-3 mb-4" style="background-color: rgba(255, 255, 255, 0.5);">
                    <div class="corner top-left">
                        <img src="{{asset('img/adorno04.png')}}" alt="Adorno esquina superior izquierda">
                    </div>
                    <div class="corner top-right">
                        <img src="{{asset('img/adorno03.png')}}" alt="Adorno esquina superior derecha">
                    </div>
                    <div class="corner bottom-left">
                        <img src="{{asset('img/adorno01.png')}}" alt="Adorno esquina inferior izquierda">
                    </div>
                    <div class="corner bottom-right">
                        <img src="{{asset('img/adorno02.png')}}" alt="Adorno esquina inferior derecha">
                    </div>
                    <div class="content">
                        <table class="table table-hover p-3 rounded-3">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Genero</th>
                                    <th scope="col">Director</th>
                                    <th scope="col">Fecha de Estreno</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $pelicula):
                                <tr>
                                    <th scope="row">{{$pelicula->id}}</th>
                                    <td scope="row">{{$pelicula->titulo}}</td>
                                    <td>{{$pelicula->descripcion}}</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection