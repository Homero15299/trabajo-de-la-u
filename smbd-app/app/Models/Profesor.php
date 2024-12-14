<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profesor extends Model
{
    public static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'tipo_id' => 'required',
        'numero_id' => 'required|integer',
        'programa' => 'required',
        'edad' => 'required',
        'fecha_nacimiento' => 'required',
        'tipo_sangre' => 'required',
        'tipo_vinculacion_id' => 'required|integer',
        'salario_mensual_id' => 'required|integer',
    ];

    protected $table = 'profesores';

    protected $fillable = ['nombre', 'apellido', 'tipo_id',
        'numero_id', 'programa', 'edad', 'fecha_nacimiento',
        'tipo_sangre', 'tipo_vinculacion_id', 'salario_mensual_id'];

    // Relación con Nómina
    public function nomina()   
    {
        return $this->hasMany('App\Models\Nomina', 'id', 'profesor_id');
    }

    // Consulta para RIGHT JOIN
    /*public static function obtenerDatosNomina()
{
    return DB::table('profesores')
        ->rightJoin('nomina', 'profesores.id', '=', 'nomina.profesor_id')
        ->select('profesores.nombre', 'profesores.apellido', 'nomina.id', 'nomina.salario', 'nomina.id as nomina_id')
        ->get()
        ->map(function ($item){
            $item->id = (string) $item->id;
            return $item;      
        });


}*/

public function salarioMensual()
{
    return $this->belongsTo(Nomina::class, 'salario_mensual', 'id');
}

public function tipoVinculacion()
{
    return $this->belongsTo(Nomina::class, 'tipo_vinculacion', 'id');
}


}
