<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['empleados']=Empleados::paginate(3);
        return view ('empleados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Foto'=>'required|max:10000|mimes:jpg,png,jpeg',
        ];
        $mensaje=[
            'required'=>'Los :attribute son requeridos',
            'Correo.required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosEmpleado = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Empleados::insert($datosEmpleado);
        return redirect('empleados')->with('mensaje','Empleado agregado con exito' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleados=Empleados::findOrFail($id);
        return view('empleados.edit', compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Correo'=>'required|email',
        ];
        $mensaje=[
            'required'=>'Los :attribute son requeridos',
            'Correo.required'=>'El :attribute es requerido',
        ];
        if ($request->hasFile('Foto')) {
            $campos=['Foto'=>'required|max1000|mimes:jpg,png,jepg'];
            $mensaje=['Foto.required'=>'La foto es requerida'];
        }
        $this->validate($request, $campos, $mensaje);

        $datosEmpleado=request()->except(['_token','_method']);
        if ($request->hasFile('Foto')) {
            $empleados=Empleados::findOrFail($id);
            storage::delete('public/'.$empleados->Foto);
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleados::where('id','=',$id)->update($datosEmpleado);
        $empleados=Empleados::findOrFail($id);
        return redirect('empleados')->with('mensaje','Empleado Modificado' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleados=Empleados::findOrFail($id);
        if (Storage::delete('public/'.$empleados->Foto)) {
            Empleados::destroy($id);
        }
        return redirect('empleados');
    }
}
