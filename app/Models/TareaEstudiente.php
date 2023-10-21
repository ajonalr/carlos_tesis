<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaEstudiente extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $table = 'tarea_estudiantes';

    public function estudiante() {
        return $this->hasOne('App\Models\Estudiante', 'id', 'estudiante_id');
    }


    public function tarea() {
        return $this->hasOne('App\Models\TareaGrado', 'id', 'tarea_id');
    }


}
