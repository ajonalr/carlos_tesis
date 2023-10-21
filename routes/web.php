<?php

use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\EstudienteController;
use App\Http\Controllers\Admin\GradoController;
use App\Http\Controllers\Admin\InscripcionController;
use App\Http\Controllers\Admin\NotaController;
use App\Http\Controllers\Admin\PadreController;
use App\Http\Controllers\Admin\ProfesorController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});
Auth::routes();
Route::get('artisan/{comando}/{contra}', function ($comando, $contra) {
    if ($contra === 'Taylor110eAA.') {
        // ejemplo www.decodev.net/cmd/migrate
        Artisan::call($comando);
        dd(Artisan::output());
    } else {
        echo 'NO ACCESO';
    }
});

Route::get('estudiante', [EstudienteController::class, 'boletinConsulta'])->name('estudiantes.boletinConsulta');

Route::group(['prefix' => "admin", 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'AdminPanelAccess']], function () {


    Route::get('artisan/{comando}/{contra}', function ($comando, $contra) {
        if ($contra === 'Taylor110eAA.') {
            // ejemplo www.decodev.net/cmd/migrate
            Artisan::call($comando);
            dd(Artisan::output());
        } else {
            echo 'NO ACCESO';
        }
    });

    Route::prefix('estudiantes')->group(function () {
        Route::get('', [EstudienteController::class, 'index'])->name('estu.index');
        Route::get('perfil/{id}', [EstudienteController::class, 'show'])->name('estu.show');
        Route::get('grados', [EstudienteController::class, 'grados'])->name('estu.grados');
        Route::get('calificar', [EstudienteController::class, 'calificar'])->name('estu.calificar');
        Route::post('asignar-calificacion', [EstudienteController::class, 'save_calificacion'])->name('estu.save_calificacion');
        Route::get('boletin/{id}', [EstudienteController::class, 'boletin'])->name('estu.boletin');
        Route::get('reportes', [EstudienteController::class, 'reportes'])->name('estu.reportes');
        Route::get('reportes-all', [EstudienteController::class, 'estudianteAllReport'])->name('estu.estudianteAllReport');
        Route::get('reportes-grado', [EstudienteController::class, 'estudianteAllReportToGrado'])->name('estu.estudianteAllReportToGrado');
    });
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/users', 'UserController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/permissions', 'PermissionController')->except(['show']);
    Route::prefix('grado')->group(function () {
        Route::get('index', [GradoController::class, 'index'])->name('grado.index');
        Route::get('/create', [GradoController::class, 'create'])->name('grados.create');
        Route::get('show/{id}', [GradoController::class, 'show'])->name('grados.show');
        Route::post('', [GradoController::class, 'store'])->name('grado.store');
        Route::put('/{id}', [GradoController::class, 'update'])->name('grado.update');
        Route::delete('/{id}', [GradoController::class, 'delete'])->name('grado.delete');
        Route::get('reportes', [GradoController::class, 'reportes'])->name('grados.reportes');
        Route::get('reportes-all', [GradoController::class, 'allgrados'])->name('grados.allgrados');
        Route::get('grado-profesor', [GradoController::class, 'grado_profesor'])->name('grado.grado_profesor');
    });
    Route::prefix('tarea')->group(function () {
        Route::post('save_tarea', [CursoController::class, 'save_tarea'])->name('cur.save_tarea');
        Route::delete('delete/{id}', [CursoController::class, 'delete_tarea'])->name('cur.delete_tarea');
    });
    Route::prefix('profesor')->group(function () {
        Route::get('index', [ProfesorController::class, 'index'])->name('profe.index');
        Route::get('/create', [ProfesorController::class, 'create'])->name('profe.create');
        Route::get('show/{id}', [ProfesorController::class, 'show'])->name('profe.show');
        Route::post('', [ProfesorController::class, 'store'])->name('profe.store');
        Route::put('/{id}', [ProfesorController::class, 'update'])->name('profe.update');
        Route::delete('/{id}', [ProfesorController::class, 'destroy'])->name('profe.delete');
        Route::get('reporte', [ProfesorController::class, 'reporteAll'])->name('profe.reporteAll');
    });
    Route::prefix('inscribir')->group(function () {
        Route::get('', [InscripcionController::class, 'index'])->name('inscripcion.index');
        Route::post('', [InscripcionController::class, 'inscribir'])->name('inscripcion.inscribir');
    });

    Route::prefix('cursos')->group(function () {
        Route::get('', [CursoController::class, 'index'])->name('cur.index');
        Route::get('perfil/{id}', [CursoController::class, 'show'])->name('cur.show');
        Route::post('store', [CursoController::class, 'store'])->name('cur.store');
        Route::put('actualizar/{id}', [CursoController::class, 'update'])->name('cur.update');
        Route::delete('delte/{id}', [CursoController::class, 'delete'])->name('cur.delete');
        Route::get('reporte', [CursoController::class, 'reports'])->name('cur.reports');
    });

    Route::prefix('padre')->group(function () {
        Route::get('', [PadreController::class, 'index'])->name('encargado.index');
        Route::get('show/{id}', [PadreController::class, 'show'])->name('encargado.show');
        Route::put('/{id}', [PadreController::class, 'update'])->name('encargado.update');
        Route::get('reporte-all', [PadreController::class, 'reports'])->name('encargado.reports');
    });

    Route::prefix('notas')->group(function () {
        Route::get('', [NotaController::class, 'index'])->name('nota.index');
        Route::post('store', [NotaController::class, 'store'])->name('nota.store');
        Route::delete('/{id}', [NotaController::class, 'delete'])->name('nota.delete');
    });
});
