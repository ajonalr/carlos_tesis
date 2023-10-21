<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoProfesor extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $table = 'grado_profesor';


    public function profesor()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function grado()
    {
        return $this->hasOne('App\Models\Grado', 'id', 'grado_id');
    }

}
