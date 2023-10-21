<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\GradoProfesor;
use App\Models\TareaGrado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::all();
        return view('admin.grados.index', compact('grados'));
    }

    public function show($id)
    {
        $grado = Grado::find($id);
        $cursos = Curso::where('grado_id', $id)->get();
        return view('admin.grados.show', compact('grado', 'cursos'));
    }

    public function create()
    {
        return view('admin.grados.create');
    }

    public function store(Request $request)
    {
        Grado::create($request->all());
        return back()->with(['info' => 'grado guardado con exito', 'color' => 'success']);
    }

    public function delete($id)
    {
        Grado::find($id)->delete();
        return back()->with(['info' => 'grado elimindado con exito', 'color' => 'success']);
    }

    public function update(Request $request, $id)
    {
        Grado::find($id)->update($request->all());
        return back()->with(['info' => 'grado actualizado con exito', 'color' => 'success']);
    }

    // retorna la vista para realizar reportes
    public function reportes()
    {
        $grado = Grado::all();
        return view('admin.grados.reportes', compact('grado'));
    }

    public function allgrados()
    {
        $data = Grado::all();
        return view('admin.grados.reportes.all', compact('data'));
    }

    // tareas to bimestre retorna las trareas de un grado y bimestre
    public function tareas_to_grado(Request $request)
    {
        $data =
            DB::table('tarea_grados as tg')
            ->join('cursos as cu', 'tg.curso_id', '=', 'cu.id')
            ->select('tg.*', 'cu.*')
            ->where('cu.grado_id', $request->grado_id)
            ->where('tg.bimestre', $request->bimestre)
            ->get();
    }

    // relaciona un profesor a un grado

    public function grado_profesor(Request $request)
    {
        if ($request->user_id && $request->grado_id) {
            GradoProfesor::create($request->all());
            return back()->with(['info' => 'regitro asignado con exito exito', 'color' => 'success']);
        }
        return view('admin.grados.profesor', ['users' => User::where('role_id', 2)->get(), 'grados' => Grado::all()]);
    }
}
