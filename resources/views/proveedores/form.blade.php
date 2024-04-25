
<h2>Formulario para {{ $modo }} Proveedores</h2> <br>
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
    <label for="">Nombres</label>
    <input type="text" class="form-control" name="Nombres" id="Nombres" value="{{ isset($proveedores->Nombres)?$proveedores->Nombres:old('Nombres') }} "> <br>
    </div>
    <div class="form-group">
    <label for="">Dirección</label>
    <input type="text" class="form-control" name="Direccion" id="Direccion" value="{{ isset($proveedores->Direccion)?$proveedores->Direccion:old('Direccion') }} "> <br>
    </div>
    <div class="form-group">
    <label for="">Correo</label>
    <input type="email" class="form-control" name="Correo" id="Correo" value="{{ isset($proveedores->Correo)?$proveedores->Correo:old('Correo') }} "> <br>
    </div>
    <div class="form-group">
    <label for="">Ciudad</label>
    <input type="text" class="form-control" name="Ciudad" id="Ciudad" value="{{ isset($proveedores->Ciudad)?$proveedores->Ciudad:old('Ciudad') }} "> <br>
    </div>
    <div class="form-group">
    <label for="">Telefono</label>
    <input type="tel" class="form-control" name="Telefono" id="Telefono" value="{{ isset($proveedores->Telefono)?$proveedores->Telefono:old('Telefono') }} "> <br>
    </div>
    <div class="form-group">
    <label for="">Estado</label>
    <input type="text" class="form-control" name="Estado" id="Estado" value="{{ isset($proveedores->Estado)?$proveedores->Estado:old('Estado') }} ">
    <br>
    </div>
    <input type="submit" class="btn btn-success"  value=" {{ $modo }} Datos">
    <a href="{{ url('/proveedores/') }}" class="btn btn-warning" >Volver</a>

