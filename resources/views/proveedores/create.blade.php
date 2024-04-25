@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/proveedores')}}" method="post" enctype="multipart/form-data" >
    @csrf
    @include('proveedores.form' , ['modo'=>'Crear'])
</form>
</div>
@endsection
