@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Vehiculo</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!!Form::open(array('url'=>'vehiculo','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Placa</label>
            <input type="text" name="placa" class="form-control" placeholder="Placa...">
        </div>
        <div class="form-group">
            <label for="descripcion">Tipo</label>
            <input type="text" name="tipo" class="form-control" placeholder="Tipo...">
        </div>
        <div class="form-group">
            <label for="descripcion">Modelo</label>
            <input type="text" name="modelo" class="form-control" placeholder="Modelo...">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
            <a href="{{ route('vehiculo.index') }}" class="btn btn-info">Atrás</a>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection