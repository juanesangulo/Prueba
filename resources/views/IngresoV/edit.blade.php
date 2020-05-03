@extends('layouts.layout')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Ingreso</h3>
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
        <form method="POST" action="{{ route('ingresoV.update',$ingreso->id) }}" role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="form-group">
                <label for="nombre">Placa</label>
                <input type="text" name="vehiculo_id" id="vehiculo_id" class="form-control inputsm" value="{{$ingreso->vehiculo_id}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Fecha</label>
                <input type="text" name="fecha_ingreso" id="fecha" class="form-control inputsm" value="{{$ingreso->fecha_ingreso}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Estado</label>
                <input type="text" name="estado" id="estado" class="form-control inputsm" value="{{$ingreso->estado}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Id User</label>
                <input type="text" name="users_id" id="users_id" class="form-control inputsm" value="{{$ingreso->users_id}}">
            </div>
            <div class="form-group">
                <input type="submit" value="Actualizar" class="btn btn-success">
                <a href="{{ route('ingresoV.index') }}" class="btn btn-info">Atrás</a>
            </div>
        </form>
    </div>
</div>


@endsection