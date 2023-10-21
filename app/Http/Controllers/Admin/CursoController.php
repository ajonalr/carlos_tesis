<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Inscripcion;
use App\Models\TareaEstudiente;
use App\Models\TareaGrado;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        $grado = Grado::all();
        return view('admin.cursos.index', compact('cursos', 'grado'));
    }

    public function store(Request $request)
    {
        // dd('aqui');
        $curso = Curso::create($request->all());
        $this->temporalTask($curso, $request, 1);
        $this->temporalTask($curso, $request, 2);
        $this->temporalTask($curso, $request, 3);
        $this->temporalTask($curso, $request, 4);


        return back()->with(['info' => 'Curso registrado con exito', 'color' => 'success']);
    }

    public function show($id)
    {
        $curso = Curso::find($id);
        $grado = Grado::all();
        $tareas = TareaGrado::where('curso_id', $curso->id)->get();
        return view('admin.cursos.show', compact('curso', 'grado', 'tareas'));
    }

    public function delete($id)
    {
        $curso = Curso::find($id)->delete();
        if ($curso) {
            return back()->with(['info' => 'Curso eliminado con exito', 'color' => 'success']);
        }
        return back()->with(['info' => 'TENEMOS UN PROBLEMAS', 'color' => 'warning']);
    }

    public function update(Request $request, $id)
    {
        Curso::find($id)->update($request->all());
        return back()->with(['info' => 'Curso actualizado con exito', 'color' => 'success']);
    }

    // GUARDA UNA TAREA PARA UN GRADO Y ASIGNA TAREA A LOS ESTUDIANTES
    public function save_tarea(Request $request)
    {
        $estudiantes =  Inscripcion::where('grado_id', $request->grado_id)->get();
        $tarea_grados = new TareaGrado();
        $tarea_grados->curso_id = $request->curso_id;
        $tarea_grados->nombre = $request->nombre;
        $tarea_grados->valor = $request->valor;
        $tarea_grados->fecha_de_entrega = $request->fecha_de_entrega;
        $tarea_grados->bimestre = $request->bimestre;
        $tarea_grados->save();

        foreach ($estudiantes as $e) {
            $t = new TareaEstudiente();
            $t->estudiante_id = $e->id;
            $t->tarea_id = $tarea_grados->id;
            $t->calificacion = 0;
            $t->save();
        }
        return back()->with(['info' => 'TAREA asignada con exito', 'color' => 'success']);
    }

    // elimina los una tarea asignada y elimina los datos de tarea de estudiante
    public function delete_tarea($id)
    {
        $t = TareaGrado::find($id);
        $te = TareaEstudiente::where('tarea_id', $t->id)->get();
        foreach ($te as $ted) {
            $ted->delete();
        }
        $t->delete();
        return back()->with(['info' => 'TAREA eliminada con exito', 'color' => 'success']);
    }

    // retona el reporte de todos los cursos registrados
    public function reports()
    {
        $data = Curso::all();
        return view('admin.cursos.reporte', compact('data'));
    }


    // GUARDA LAS TAREAS TEMPORALES
    public function temporalTask(Curso $curso, Request $request, $bimestre)
    {

        $estudiantes =  Inscripcion::where('grado_id', $request->grado_id)->get();

        $tarea_grados = new TareaGrado();
        $tarea_grados->curso_id = $curso->id;
        $tarea_grados->nombre = 'TEMPORAL '. $bimestre;
        $tarea_grados->valor = 0;
        $tarea_grados->bimestre = $bimestre;
        $tarea_grados->save();

        foreach ($estudiantes as $e) {
            $t = new TareaEstudiente();
            $t->estudiante_id = $e->id;
            $t->tarea_id = $tarea_grados->id;
            $t->calificacion = 0;
            $t->save();
        }
    }
}
