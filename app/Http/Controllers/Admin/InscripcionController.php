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
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $grado = Grado::all();
        return view('admin.inscripcion.create', ['grados' => $grado]);
    }

    public function inscribir(Request $request)
    {

        // =============================================
        // =============================================
        // ==== ariel___Ramirez___123   =======
        // =============================================
        // =============================================

        $grado_id = explode("___", $request->grado_id);
        $encargado = new Padre();

        $encargado->nombre1 = $request->nombre1;
        $encargado->dpi1 = $request->dpi1;
        $encargado->direccion1 = $request->direccion1;
        $encargado->edad1 = $request->edad1;
        $encargado->telefono1 = $request->telefono1;

        $encargado->save();

        $estudiante = new Estudiante();
        $estudiante->nombre = $request->nombre;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->cui = $request->cui;
        $estudiante->grado_id = $grado_id[0];
        $estudiante->save();

        $inscripcion = new Inscripcion();

        $inscripcion->padre_id = $encargado->id;
        $inscripcion->estudiante_id = $estudiante->id;
        $inscripcion->grado_id = $grado_id[0];

        $inscripcion->save();



        // buscamos los cusrsos de un grado
        $curso = Curso::where('grado_id', $grado_id[0])->get();

        if (count($curso) > 0) {

            foreach ($curso as $cur) {
                // asignamos todas la tareas de un estudiante nuevo
                $tareas_grado = TareaGrado::where('curso_id', $cur->id)->get();

                if (count($tareas_grado) > 0) {
                    foreach ($tareas_grado as $ta) {
                        $te = new TareaEstudiente();
                        $te->estudiante_id = $estudiante->id;
                        $te->tarea_id = $ta->id;
                        $te->calificacion = 0;
                        $te->save();
                    }
                }


            }
        }


        return back()->with(['info' => 'ESTUDIANTE '  . $estudiante->nombre . ' INSCRITO CON EXITO', 'color' => 'success']);
    }
}
