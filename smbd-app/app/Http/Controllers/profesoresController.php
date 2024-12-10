<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;

class profesoresController extends Controller
{
    /**
     * Muestra la lista de profesores con paginación.
     */
    public function index()
    {  
        $profesores = Profesor::paginate(10); // Ajuste del número de elementos por página
        return view('profesores.index', compact('profesores'));
    }

    /**
     * Muestra el formulario para crear un nuevo profesor.
     */
    public function create()
    {
        $profesor = new Profesor(); // Usamos singular, ya que estamos creando uno
        return view('profesores.create', compact('profesor'));
    }

    /**
     * Almacena un nuevo profesor en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate(Profesor::$rules); // Validación explícita

        Profesor::create($request->all());

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor insertado correctamente');
    }

    /**
     * Muestra el formulario para editar un profesor existente.
     */
    public function edit($id)
    {
        $profesor = Profesor::find($id);

        // Verificación de existencia
        if (!$profesor) {
            abort(404, 'Profesor no encontrado');
        }

        return view('profesores.edit', compact('profesor'));
    }

    /**
     * Actualiza los datos de un profesor existente.
     */
    public function update(Request $request, $id)
{
    $profesor = Profesor::findOrFail($id);

    // Validación de los campos
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'edad' => 'required|integer',
        'tipo_sangre' => 'required|string|max:10',
        'numero_id' => 'required|numeric',
        'tipo_id' => 'required|string|max:10',
        'fecha_nacimiento' => 'required|date',
        'programa' => 'required|string|max:255',
    ]);

    // Actualización del profesor
    $profesor->update($validated);

    return redirect()->route('profesores.index')->with('success', 'Profesor actualizado correctamente.');
}


    /**
     * Elimina un profesor de la base de datos.
     */
    public function destroy($id)
    {
        $profesor = Profesor::find($id);

        // Verificación de existencia antes de eliminar
        if (!$profesor) {
            abort(404, 'Profesor no encontrado');
        }

        $profesor->delete();

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor eliminado correctamente');
    }
}

