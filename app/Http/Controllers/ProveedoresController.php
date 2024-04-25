<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['proveedores']=Proveedores::paginate(6);
        return view('proveedores.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombres'=>'required|string|max:50',
            'Direccion'=>'required|string|max:50',
            'Correo'=>'required|email',
            'Ciudad'=>'required|string|max:20',
            'Telefono'=>'required|string|max:20',
            'Estado'=>'required|string|max:20',
        ];
        $mensaje=[
            'required'=>'Los :attribute son requeridos',
            'Dirreccion.required'=>'La :attribute es requerida',
            'Correo.required'=>'El :attribute es requerido',
            'Ciudad.required'=>'La :attribute es requerida',
            'Telefono.required'=>'El :attribute es requerido',
            'Estado.required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosProveedor=request()->except('_token');
        Proveedores::insert($datosProveedor);
        return redirect('proveedores')->with('mensaje','Proveedor agregado con exito' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proveedores=Proveedores::findOrFail($id);
        return view('proveedores.edit', compact('proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombres'=>'required|string|max:50',
            'Direccion'=>'required|string|max:50',
            'Correo'=>'required|email',
            'Ciudad'=>'required|string|max:20',
            'Telefono'=>'required|string|max:20',
            'Estado'=>'required|string|max:20',
        ];
        $mensaje=[
            'required'=>'Los :attribute son requeridos',
            'Direccion.required'=>'La :attribute es requerida',
            'Correo.required'=>'El :attribute es requerido',
            'Ciudad.required'=>'La :attribute es requerida',
            'Telefono.required'=>'El :attribute es requerido',
            'Estado.required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosProveedor=request()->except(['_token','_method']);
        Proveedores::where('id','=',$id)->update($datosProveedor);
        $proveedores=Proveedores::findOrFail($id);
        return redirect('proveedores')->with('mensaje','Proveedor Modificado' );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Proveedores::destroy($id);
        return redirect('proveedores');
    }
}
