@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Vehiculos <a href="vehiculo/create">
                <button class="btn btn-success">Nuevo</button></a></h3>
    </div>
</div>
@include('Vehiculo.search')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>tipo</th>
                    <th>placa</th>
                    <th>modelo</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->id}}</td>
                    <td>{{ $vehiculo->tipo}}</td>
                    <td>{{ $vehiculo->placa}}</td>
                    <td>{{ $vehiculo->modelo}}</td>
                    <td>
                        <a href="{{URL::action('VehiculoController@edit',$vehiculo->id)}}">
                            <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$vehiculo->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @include('Vehiculo.modal')
                @endforeach
            </table>
        </div>
        {{$vehiculos->render()}}
    </div>
</div>
@endsection