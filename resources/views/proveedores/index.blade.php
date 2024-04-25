@extends('layouts.app')
@section('content')
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
    {{ session::get('mensaje') }}
    </div>
    @endif
<h2>Inicio Proveedores</h2>
<a href="{{ url('/proveedores/create') }}" class="btn btn-success">AGREGAR NUEVO EMPLEADO!!</a>
<table class="table table-light">
    <thead class="thead-light" >
        <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Ciudad</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proveedores as $proveedor)
        <tr>
            <td>{{$proveedor->id}}</td>
            <td>{{$proveedor->Nombres}}</td>
            <td>{{$proveedor->Direccion}}</td>
            <td>{{$proveedor->Correo}}</td>
            <td>{{$proveedor->Ciudad}}</td>
            <td>{{$proveedor->Telefono}}</td>
            <td>{{$proveedor->Estado}}</td>
            <td>
                <a href="{{ url('/proveedores/'.$proveedor->id.'/edit') }}" class="btn btn-warning">Editar</a> |
                <form action="{{ url('/proveedores/'.$proveedor->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm ('¿Estas seguro de borrar?')" class="btn btn-danger" value="Borrar" >
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
