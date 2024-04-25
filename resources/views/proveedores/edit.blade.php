@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/proveedores/'.$proveedores->id) }}" method="post" enctype="multipart/form-data" >
    @csrf
    {{ method_field('PATCH') }}
    @include('proveedores.form', ['modo'=>'Editar'])
</form>
</div>
@endsection

