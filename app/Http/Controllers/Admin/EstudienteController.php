<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Inscripcion;
use App\Models\Padre;
use App\Models\TareaEstudiente;
use App\Models\TareaGrado;
use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class EstudienteController extends Controller
{

    public function index()
    {
        $inscripcion = Inscripcion::all();
        return view('admin.estudiente.index', compact('inscripcion'));
    }

    public function show($id)
    {
        $estu = Inscripcion::find($id);

        $padre = Padre::find($estu->padre_id)->first();

        return view('admin.estudiente.show', compact('estu', 'padre'));
    }

    public function grados(Request $request)
    {
        $inscripcion = null;
        $vis = false;
        if ($request->grado_id) {
            $vis = true;
            $inscripcion = Inscripcion::where('grado_id', $request->grado_id)->get();
        }

        $grados = Grado::all();
        return view('admin.estudiente.grados', compact('inscripcion', 'vis', 'grados'));
    }

    public function calificar(Request $request)
    {

        $grados = Grado::all();
        $v_grado = true;
        $v_cursos = false;
        $cursos = null;
        $v_tareas = false;
        $tareas = null;
        $v_esu = false;
        $estu = null;

        if ($request->grado_id) {
            $v_cursos = true;
            $v_grado = false;
            $cursos = Curso::where('grado_id', $request->grado_id)->get();
        }
        if ($request->curso_id) {
            $v_cursos = false;
            $v_grado = false;
            $v_tareas = true;

            $tareas = DB::table('tarea_grados as tareas')
                ->join('cursos as cur', 'tareas.curso_id', '=', 'cur.id')
                ->select('tareas.nombre', 'tareas.valor', 'tareas.fecha_de_entrega', 'tareas.bimestre', 'cur.nombre as curso', 'tareas.id')
                ->where('tareas.curso_id', $request->curso_id)
                ->get();
        }


        if ($request->tarea_id) {

            $v_cursos = false;
            $v_grado = true;
            $v_tareas = false;
            $v_esu = true;
            $estu = TareaEstudiente::where('tarea_id', $request->tarea_id)->get();
        }

        return view('admin.estudiente.calificar', compact(
            'grados',
            'v_grado',
            'v_cursos',
            'cursos',
            'v_tareas',
            'tareas',
            'v_esu',
            'estu',
        ));
    }


    public function save_calificacion(Request $request)
    {
        $t = TareaEstudiente::find($request->tarea_id);
        $t->calificacion = $request->calificacion;
        $t->save();
        return back()->with(['info' => 'NOTA / CALIFICACION REGISTRADA CON EXITO', 'color' => 'info']);
    }

    // retorna el boletin del estudiante
    public function boletin($id)
    {

        $estudiante =  Inscripcion::find($id);
        $grado = Grado::find($estudiante->grado_id);
        $cursos = Curso::where('grado_id', $estudiante->grado_id)->get();
        // recorer curso para buscar tarea

        $bimestre1 = array();
        $bimestre2 = array();
        $bimestre3 = array();
        $bimestre4 = array();
        $cusos_array = array();

        foreach ($cursos as $c) {

            $tarea1 =
                DB::table('tarea_estudiantes as tareas')
                ->join('tarea_grados as tg', 'tareas.tarea_id', '=', 'tg.id')
                ->join('cursos as cur', 'tg.curso_id', '=', 'cur.id')
                ->select(
                    DB::raw('sum(tareas.calificacion) as suma'),
                    'cur.nombre',
                    'tg.nombre as tarea_nombre',
                    'tg.bimestre'
                )
                ->groupBy('cur.id')
                ->where('tg.bimestre', 1)
                ->where('tareas.estudiante_id', $estudiante->estudiante_id)
                ->get();

            $tarea2 =
                DB::table('tarea_estudiantes as tareas')
                ->join('tarea_grados as tg', 'tareas.tarea_id', '=', 'tg.id')
                ->join('cursos as cur', 'tg.curso_id', '=', 'cur.id')
                ->select(
                    DB::raw('sum(tareas.calificacion) as suma'),
                    'cur.nombre',
                    'tg.nombre as tarea_nombre',
                    'tg.bimestre'
                )
                ->groupBy('cur.id')
                ->where('tg.bimestre', 2)
                ->where('tareas.estudiante_id', $estudiante->estudiante_id)
                ->get();

            $tarea3 =
                DB::table('tarea_estudiantes as tareas')
                ->join('tarea_grados as tg', 'tareas.tarea_id', '=', 'tg.id')
                ->join('cursos as cur', 'tg.curso_id', '=', 'cur.id')
                ->select(
                    DB::raw('sum(tareas.calificacion) as suma'),
                    'cur.nombre',
                    'tg.nombre as tarea_nombre',
                    'tg.bimestre'
                )
                ->groupBy('cur.id')
                ->where('tg.bimestre', 3)
                ->where('tareas.estudiante_id', $estudiante->estudiante_id)
                ->get();

            $tarea4 =
                DB::table('tarea_estudiantes as tareas')
                ->join('tarea_grados as tg', 'tareas.tarea_id', '=', 'tg.id')
                ->join('cursos as cur', 'tg.curso_id', '=', 'cur.id')
                ->select(
                    DB::raw('sum(tareas.calificacion) as suma'),
                    'cur.nombre',
                    'tg.nombre as tarea_nombre',
                    'tg.bimestre'
                )
                ->groupBy('cur.id')
                ->where('tg.bimestre', 4)
                ->where('tareas.estudiante_id', $estudiante->estudiante_id)
                ->get();

            array_push($bimestre1, $tarea1);
            array_push($bimestre2, $tarea2);
            array_push($bimestre3, $tarea3);
            array_push($bimestre4, $tarea4);
        }

        $new_Array = array();

        for ($i = 0; $i < count($bimestre1); $i++) {
            array_push($new_Array, array($bimestre1[$i][$i]->nombre, $bimestre1[$i][$i]->suma, $bimestre2[$i][$i]->suma, $bimestre3[$i][$i]->suma, $bimestre4[$i][$i]->suma));
        }

        $no = 1;
        return view('admin.reports.estudiantes.boletin', compact('bimestre1', 'bimestre2', 'bimestre3', 'bimestre4', 'no', 'new_Array', 'estudiante', 'grado'));
    }

    // retorna la vista para los reportes
    public function reportes()
    {
        $grados = Grado::all();
        return view('admin.estudiente.reportes', compact('grados'));
    }

    // retorna el reporte de toso los estudientes inscritos
    public function estudianteAllReport()
    {
        $data = Inscripcion::all();
        // dd();

        return view('admin.estudiente.reportes.all', compact('data'));
    }

    // retorna el reporte de toso los estudientes inscritos por grado
    public function estudianteAllReportToGrado(Request $request)
    {
        $data = Inscripcion::where('grado_id', $request->grado_id)
            ->get();

        // dd($request->grado_id);


        return view('admin.estudiente.reportes.all', compact('data'));
    }

    // retorna el voletin para el padre de familia
    public function boletinConsulta(Request $request)
    {
        $vis = false;
        $estudiante = null;

        $bimestre1 = null;
        $bimestre2 = null;
        $bimestre3 = null;
        $bimestre4 = null;
        $no = null;
        $new_Array = null;
        $estudiante = null;
        $grado = null;

        if ($request->cui) {

            $estudiante =  Estudiante::where('cui', $request->cui)->first();


            $grado = Grado::find($request->grado_id);
            $cursos = Curso::where('grado_id', $request->grado_id)->get();
            // recorer curso para buscar tarea

            $bimestre1 = array();
            $bimestre2 = array();
            $bimestre3 = array();
            $bimestre4 = array();


            $cusos_array = array();

            foreach ($cursos as $c) {


                $tarea1 =
                    DB::table('tarea_estudiantes as tareas')
                    ->join('tarea_grados as tg', 'tareas.tarea_id', '=', 'tg.id')
                    ->join('cursos as cur', 'tg.curso_id', '=', 'cur.id')
                    ->select(
                        DB::raw('sum(tareas.calificacion) as suma'),
                        'cur.nombre',
                        'tg.nombre as tarea_nombre',
                        'tg.bimestre'
                    )
                    ->groupBy('cur.id')
                    ->where('tg.bimestre', 1)
                    ->where('tareas.estudiante_id', $estudiante->id)
                    ->get();

                $tarea2 =
                    DB::table('tarea_estudiantes as tareas')
                    ->join('tarea_grados as tg', 'tareas.tarea_id', '=', 'tg.id')
                    ->join('cursos as cur', 'tg.curso_id', '=', 'cur.id')
                    ->select(
                        DB::raw('sum(tareas.calificacion) as suma'),
                        'cur.nombre',
                        'tg.nombre as tarea_nombre',
                        'tg.bimestre'
                    )
                    ->groupBy('cur.id')
                    ->where('tg.bimestre', 2)
                    ->where('tareas.estudiante_id', $estudiante->id)
                    ->get();

                $tarea3 =
                    DB::table('tarea_estudiantes as tareas')
                    ->join('tarea_grados as tg', 'tareas.tarea_id', '=', 'tg.id')
                    ->join('cursos as cur', 'tg.curso_id', '=', 'cur.id')
                    ->select(
                        DB::raw('sum(tareas.calificacion) as suma'),
                        'cur.nombre',
                        'tg.nombre as tarea_nombre',
                        'tg.bimestre'
                    )
                    ->groupBy('cur.id')
                    ->where('tg.bimestre', 3)
                    ->where('tareas.estudiante_id', $estudiante->id)
                    ->get();

                $tarea4 =
                    DB::table('tarea_estudiantes as tareas')
                    ->join('tarea_grados as tg', 'tareas.tarea_id', '=', 'tg.id')
                    ->join('cursos as cur', 'tg.curso_id', '=', 'cur.id')
                    ->select(
                        DB::raw('sum(tareas.calificacion) as suma'),
                        'cur.nombre',
                        'tg.nombre as tarea_nombre',
                        'tg.bimestre'
                    )
                    ->groupBy('cur.id')
                    ->where('tg.bimestre', 4)
                    ->where('tareas.estudiante_id', $estudiante->id)
                    ->get();

                array_push($bimestre1, $tarea1);
                array_push($bimestre2, $tarea2);
                array_push($bimestre3, $tarea3);
                array_push($bimestre4, $tarea4);
            }

            $new_Array = array();

            for ($i = 0; $i < count($bimestre1); $i++) {
                array_push($new_Array, array($bimestre1[$i][$i]->nombre, $bimestre1[$i][$i]->suma, $bimestre2[$i][$i]->suma, $bimestre3[$i][$i]->suma, $bimestre4[$i][$i]->suma));
            }
            $vis = true;
            $no = 1;
        }

        $grados = Grado::all();
        return view('padre', compact('bimestre1', 'bimestre2', 'bimestre3', 'bimestre4', 'no', 'new_Array', 'estudiante', 'grado', 'vis', 'grados'));
    }
}
