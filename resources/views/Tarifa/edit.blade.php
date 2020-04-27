@extends('layouts.layout')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Tarifa</h3>
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
        <form method="POST" action="{{ route('tarifa.update',$tarifa->id) }}" role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="form-group">
                <label for="nombre">Tipo Vehículo</label>
                <input type="text" name="tipo" id="tipo" class="form-control inputsm" value="{{$tarifa->tipo}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Valor</label>
                <input type="text" name="valor" id="valor" class="form-control inputsm" value="{{$tarifa->valor}}">
            </div>

            <div class="form-group">
                <label for="descripcion">Estado</label>
                <input type="text" name="estado" id="estado" class="form-control inputsm" value="{{$tarifa->estado}}">
            </div>
            <div class="form-group">
                <input type="submit" value="Actualizar" class="btn btn-success">
                <a href="{{ route('tarifa.index') }}" class="btn btn-info">Atrás</a>
            </div>
        </form>
    </div>
</div>


@endsection