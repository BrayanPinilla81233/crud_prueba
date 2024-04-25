@extends('layouts.app')
@section('content')
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
    {{ session::get('mensaje') }}
    </div>
    @endif
<h1>Inicio Empleados</h1>
<a href="{{ url('/empleados/create') }}" class="btn btn-success">AGREGAR NUEVO EMPLEADO!!</a>
<br>
<table class="table table-light">
    <thead class="thead-light" >
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Accciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{$empleado->id}}</td>
            <td><img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="" width="230px" height="200px"></td>
            <td>{{$empleado->Nombres}}</td>
            <td>{{$empleado->Apellidos}}</td>
            <td>{{$empleado->Correo}}</td>
            <td>
                <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}" class="btn btn-warning">Editar</a> |
                <form action="{{url('/empleados/'.$empleado->id)}}" class="d-inline" method="post" >
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm ('¿Estas seguro de borrar?')" value="Borrar" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection
