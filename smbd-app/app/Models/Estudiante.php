<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'tipo_id' => 'required',
        'numero_id' => 'required|integer',
        'programa' => 'required',
        'semestre' => 'required',
        'edad' => 'required',
        'fecha_nacimiento' => 'required',
        'tipo_sangre' => 'required',
    ];
    protected $table = 'estudiantes';

    protected $fillable = ['nombre','apellido', 'tipo_id',
     'numero_id', 'programa', 'semestre', 'edad', 'fecha_nacimiento',
      'tipo_sangre'];
}
