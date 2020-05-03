@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Ingreso de Vehículo</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!!Form::open(array('url'=>'ingresoV','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="Role">PLACA</label>
            <select name="vehiculo_id" id="vehiculo_id" class="form-control selectpicker" data-livesearch="true" required>
                <option value="">SELECCIONE PLACA:</option>
                @foreach($vehiculo as $vehiculo)
                <option value="{{$vehiculo->id}}">{{ $vehiculo->placa }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Valor">Fecha</label>
            <input type="text" name="fecha_ingreso" class="form-control" placeholder="valor Hora..." value="{{date('Y-m-d H:i:s') }}" disable>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" class="form-control" placeholder="Estado. 1. Activo 0.Inactivo.">
            <div class="form-group">
                <label for="estado">Usuario</label>
                <input type="text" name="users_id" class="form-control" value="1" readonly>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
    @endsection