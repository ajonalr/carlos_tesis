<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaGrado extends Model
{
    use HasFactory;

    public function estudiante() {
        return $this->hasOne('App\Models\Estudiante', 'id', 'estudiante_id');
    }

    public function curso() {
        return $this->hasOne('App\Models\Curso', 'id', 'curso_id');
    }
}
