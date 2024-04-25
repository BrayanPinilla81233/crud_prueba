<h2>Formulario para {{ $modo }} empleados</h2> <br>
@if (count($errors)>0)
    <div class="alert alert-danger" role="alert" >
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="Nombres">Nombres</label>
    <input class="form-control" type="text" name="Nombres" id="Nombres" value=" {{ isset($empleados->Nombres)?$empleados->Nombres:old('Nombres') }} "> <br>
</div>
<div class="form-group">
    <label for="Apellidos">Apellidos</label>
    <input class="form-control" type="text" name="Apellidos" id="Apellidos" value=" {{ isset($empleados->Apellidos)?$empleados->Apellidos:old('Apellidos') }} "> <br>
</div>
<div class="from-group">
    <label for="Correo">Correo</label>
    <input class="form-control" type="email" name="Correo" id="Correo" value=" {{ isset($empleados->Correo)?$empleados->Correo:old('Correo') }} "> <br>
</div>
<div class="form-group">
<label for="Foto">Foto</label>
    @if (isset($empleados->Nombres))
    <img src="{{ asset('storage').'/'.$empleados->Foto }}" alt="Foto">
    @endif
    <input class="form-control" type="file" name="Foto" id="Foto" value=""> <br>
    <br>
</div>
<div class="form-group" >
    <input class="btn btn-success"  type="submit" value=" {{ $modo }} Datos">
    <a href="{{ url('/empleados/') }}" class="btn btn-warning">Regresar</a>
</div>
