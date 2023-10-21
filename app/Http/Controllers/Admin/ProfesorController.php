<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GradoProfesor;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{

    public function index()
    {
        $profe = User::where('role_id', 2)->get();
        return view('admin.profesor.index', compact('profe'));
    }

    public function create()
    {
        return view('admin.profesor.create');
    }


    public function store(Request $request)
    {

        if (User::where('email', $request->email)->exists()) {
            return back()->with(['info' => 'Emial Ya Registrado', 'color' => 'warning']);
        }

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);


        $perfil = new Perfil();

        $perfil->user_id = $user->id;
        $perfil->telefono = $request->telefono;
        $perfil->edad = $request->edad;
        $perfil->direccion = $request->direccion;

        $perfil->save();

        return back()->with(['info' => 'PROFESOR REGISTRADO CON EXITO', 'color' => 'success']);
    }

    function show($id)
    {
        $profe = User::find($id);
        $grados = GradoProfesor::where('user_id', $id)->get();

        // dd($grados);
        return view('admin.profesor.show', compact('profe', 'grados'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $user = User::find($id);
        $perfil = Perfil::find($user->perfil->id);
        $perfil->telefono = $request->telefono;
        $perfil->edad = $request->edad;
        $perfil->direccion = $request->direccion;

        $perfil->save();
        return back()->with(['color' => 'success', 'info' =>   'profesor actualizado con exito ']);
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with(['color' => 'success', 'info' =>   'profesor eliminado con exito ']);
    }

    // retorna el reporte de los profesores registrados
    public function reporteAll()
    {
        $data = User::where('role_id', 2)->get();
        return view('admin.profesor.reportes', compact('data'));
    }
}
