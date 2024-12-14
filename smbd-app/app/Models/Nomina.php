<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nomina extends Model
{
    static $rules = [
        'profesor_id' => 'required',
        'salario_mensual' => 'required',
        'tipo_vinculacion' => 'required',
    ];
    protected $table = 'nomina';

    protected $fillable = ['profesor_id','salario_mensual', 'tipo_vinculacion'];

    //RELACIN UNO A MUCHOS
    public function profesores()
    {
        return $this->hasMany(Profesor::class, 'salario_mensual_id', 'id');
    }

    public function tipoVinculacioprofesores()
    {
        return $this->hasMany(Profesor::class, 'tipo_vinculacion_id', 'id');
    }
}
