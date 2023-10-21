<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public $guarded = [];

    public function grado()
    {
        return $this->hasOne('App\Models\Grado', 'id', 'grado_id');
    }
}
