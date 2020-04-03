@extends('layouts.layout')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Vehículo</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
        @endif
        <form method="POST" action="{{ route('vehiculo.update',$vehiculo->id) }}" role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="form-group">
                <label for="nombre">Placa</label>
                <input type="text" name="placa" id="placa" class="form-control inputsm" value="{{$vehiculo->placa}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Tipo</label>
                <input type="text" name="tipo" id="tipo" class="form-control inputsm" value="{{$vehiculo->tipo}}">
            </div>

            <div class="form-group">
                <label for="descripcion">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control inputsm" value="{{$vehiculo->modelo}}">
            </div>
            <div class="form-group">
                <input type="submit" value="Actualizar" class="btn btn-success">
                <a href="{{ route('vehiculo.index') }}" class="btn btn-info">Atrás</a>
            </div>
        </form>
    </div>
</div>


@endsection