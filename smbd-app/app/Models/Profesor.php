<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'tipo_id' => 'required',
        'numero_id' => 'required|integer',
        'programa' => 'required',
        'edad' => 'required',
        'fecha_nacimiento' => 'required',
        'tipo_sangre' => 'required',
    ];
    protected $table = 'profesores';

    protected $fillable = ['nombre','apellido', 'tipo_id',
     'numero_id', 'programa', 'edad', 'fecha_nacimiento',
      'tipo_sangre'];
}