<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'incriopciones';

    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'id', 'estudiante_id');
    }

    public function padre()
    {
        return $this->hasOne('App\Models\Padre', 'id', 'padre_id');
    }

    public function grado()
    {
        return $this->hasOne('App\Models\Grado', 'id', 'grado_id');
    }
}
