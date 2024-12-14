<?php

namespace App\Http\Controllers;

use App\Models\Nomina;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    /**
     * Muestra la lista de profesores con paginación.
     */
    public function index()
    {
        $profesores = Profesor::with('nomina')->paginate(10); // Traer todos los profesores con la relación de nómina y paginación
        return view('profesores.index', compact('profesores'));
    }

    /**
     * Muestra el formulario para crear un nuevo profesor.
     */
    public function create()
{
    // Aquí obtienes la relación correctamente, pero asegúrate de que los datos estén bien estructurados
    $profesores = Profesor::with(['salarioMensual', 'tipoVinculacion'])->get();  // Colección de profesores
    $nominas = Nomina::pluck('tipo_vinculacion', 'id');
    $salarios = Nomina::pluck('salario', 'id');  // Asegúrate de usar un nombre diferente para cada variable si obtienes más de una relación

    return view('profesores.create', compact('profesores', 'nominas', 'salarios'));  // Pasa las variables correctas a la vista
}

    /**
     * Almacena un nuevo profesor en la base de datos.
     */
    public function store(Request $request)
{
    // Valida que los valores de tipo_vinculacion_id y salario_mensual_id existen en la tabla nomina
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'edad' => 'required|integer',
        'tipo_sangre' => 'required|string|max:10',
        'numero_id' => 'required|numeric|unique:profesores,numero_id',
        'tipo_id' => 'required|string|max:10',
        'fecha_nacimiento' => 'required|date',
        'programa' => 'required|string|max:255',
        'tipo_vinculacion_id' => 'required|exists:nomina,id', // Verifica que tipo_vinculacion_id exista en nomina
        'salario_mensual_id' => 'required|exists:nomina,id', // Verifica que salario_mensual_id exista en nomina
    ]);

    // Crea el nuevo profesor con los datos validados
    Profesor::create($validated);

    return redirect()->route('profesores.index')->with('success', 'Profesor creado satisfactoriamente.');
}


    /**
     * Muestra el formulario para editar un profesor existente.
     */
    public function edit($id)
    {
        // Obtén el profesor específico y sus relaciones
    $profesor = Profesor::with(['salarioMensual', 'tipoVinculacion'])->findOrFail($id); // Encuentra el profesor por ID

    return view('profesores.edit', compact('profesor')); // Pasa el profesor a la vista

    }

    /**
     * Actualiza los datos de un profesor existente.
     */
    public function update(Request $request, $id)
{
    // Encuentra al profesor
    $profesor = Profesor::findOrFail($id);

    // Validación de los datos
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'edad' => 'required|integer',
        'tipo_sangre' => 'required|string|max:10',
        'numero_id' => 'required|numeric',
        'tipo_id' => 'required|string|max:10',
        'fecha_nacimiento' => 'required|date',
        'programa' => 'required|string|max:255',
        'tipo_vinculacion_id' => 'required|exists:nomina,id',  // Validar que tipo_vinculacion_id exista en la tabla nomina
        'salario_mensual_id' => 'required|exists:nomina,id', // Validar que salario_mensual_id exista en la tabla nomina
    ]);

    // Actualización de los datos del profesor
    $profesor->update($validated);

    return redirect()->route('profesores.index')->with('success', 'Profesor actualizado correctamente.');
}

    /**
     * Elimina un profesor de la base de datos.
     */
    public function destroy($id)
    {
        // Verificación de existencia antes de eliminar
        $profesor = Profesor::findOrFail($id);

        // Eliminar el registro del profesor
        $profesor->delete();

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor eliminado correctamente');
    }
}