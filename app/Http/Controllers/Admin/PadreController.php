<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Padre;
use Illuminate\Http\Request;

class PadreController extends Controller
{
    public function index()
    {
        $encargados = Padre::all();
        return view('admin.encargados.index', ['data' => $encargados]);
    }

    public function store(Request $request)
    {
        $encargado = new Padre();
        $encargado->nombre1 = $request->nombre1;
        $encargado->nombre2 = $request->nombre2;
        $encargado->dpi1 = $request->dpi1;
        $encargado->dpi2 = $request->dpi2;
        $encargado->direccion1 = $request->direccion1;
        $encargado->direccion2 = $request->direccion2;
        $encargado->civil1 = $request->civil1;
        $encargado->civil2 = $request->civil2;
        $encargado->nacionalidad1 = $request->nacionalidad1;
        $encargado->nacionalidad2 = $request->nacionalidad2;
        $encargado->edad1 = $request->edad1;
        $encargado->edad2 = $request->edad2;
        $encargado->telefono1 = $request->telefono1;
        $encargado->telefono2 = $request->telefono2;
        $encargado->telefono3 = $request->telefono3;
        $encargado->telefono4 = $request->telefono4;

        $encargado->save();

        return $encargado;
    }

    public function update(Request $request, $id)
    {
        $encargado = Padre::findOrFail($id)->update($request->all());
        return back()->with(['info' => 'Encargado Actualizado con Exito', 'color' => 'success']);
    }

    public function show($id)
    {
        return view('admin.encargados.show', ['data' => Padre::findOrFail($id)]);
    }
    
    // retorna el reporte de todos los padres registrados
    public function reports()
    {
        $data = Padre::all();
        return view('admin.encargados.reportes', compact('data'));
    }
}
