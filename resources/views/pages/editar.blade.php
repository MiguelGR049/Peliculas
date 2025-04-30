@extends('plantilla')

@section('contenido')
@include('components/navbar')
<div class="container mb-5">
    <div class="row mt-5">
        <div class="col mt-5">
            <div class="container mt-8">
                <div class="row mb-3 justify-content-center">
                    <div class="card justify-content-center" style="width: 25rem; background-color: rgba(255, 255, 255, 0.5);">
                        <img class="mx-auto d-block" src="{{ asset('img/Itadori.png') }}" height="95" width="125px">
                        <div class="card-body row justify-content-center">

                            <h1 class="fw-bold text-center">Edicion</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection