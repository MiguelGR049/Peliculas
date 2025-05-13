@extends('plantilla')

@section('contenido')
<div class="container mt-4">
    <form method="post" action="{{route('insertar_usuario')}}" class="row mb-3 justify-content-center">
        @csrf
        <div class="card justify-content-center" style="width: 25rem; background-color: rgba(255, 255, 255, 0.5);">
            <img class="mx-auto d-block" src="{{ asset('img/Itadori.png') }}" height="95" width="125px">
            <div class="card-body row justify-content-center">

                <h1 class="fw-bold text-center">Registro de Usuario</h1>

                @error('nombre')
                <p>{{$message = "El nombre no puede ir vacio, deben ser letras empezando por mayuscula"}}</p>
                @enderror
                <label class="fw-bold" for="nombre">Nombre</label>
                <input name="nombre" id="nombre" class="form-control mb-3" type="text" placeholder="Nombre">

                @error('apellido')
                <p>{{$message  = "El apellido no puede ir vacio, deben ser letras empezando por mayuscula"}}</p>
                @enderror
                <label class="fw-bold" for="apellido">Apellido</label>
                <input name="apellido" id="apellido" class="form-control mb-3" type="text" placeholder="Apellido">

                @error('usuario')
                <p>{{$message}}</p>
                @enderror
                <label class="fw-bold" for="usuario">Usuario</label>
                <input name="usuario" id="usuario" class="form-control mb-3" type="text" placeholder="Usuario">

                @error('email')
                <p>{{$message = "El email no lleva el formato correcto"}}</p>
                @enderror
                <label class="fw-bold" for="correo">Correo Electrónico</label>
                <input name="email" id="email" class="form-control mb-3" type="email" placeholder="name@example.com">

                @error('password')
                <p>{{$message = "La contraseña no puede ir vacia"}}</p>
                @enderror
                <label class="fw-bold" for="password">Contraseña</label>
                <input name="password" id="password" class="form-control mb-3" type="password" placeholder="Contraseña">

                <div class="col justify-content-center text-center">
                    <button type="submit" class="btn btn-success mb-2"><i class="fa-solid fa-chalkboard-user"></i> Registrar</button>
                    <br>
                    <a href="{{route('login')}}" class="btn btn-link-danger"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection