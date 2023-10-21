<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Notas;
use App\Models\Padre;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $grados = Grado::count();
        $estudiante = Estudiante::count();
        $profesor = User::where('role_id', 2)->count();
        $padres = Padre::count();

        $notas = Notas::all();

        return view('admin.home', compact('grados', 'estudiante', 'profesor', 'padres' ,'notas'));
    }
}
