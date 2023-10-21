<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notas;
use Illuminate\Http\Request;

class NotaController extends Controller
{

    public function index()
    {
        $data = Notas::all();
        return view('admin.notas.index', compact('data'));
    }

    public function store(Request $request)
    {
        Notas::create($request->all());
        return back()->with(['info' => 'NOTA guardada con exito', 'color' => 'success']);
    }

    public function delete($id)
    {
        Notas::find($id)->delete();
        return back()->with(['info' => 'NOTA eliminada con exito', 'color' => 'success']);

    }
}
