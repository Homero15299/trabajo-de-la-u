<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class estudianteController extends Controller
{
    /**
     * Muestra la lista de estudiantes con paginación.
     */
    public function index()
    {
        $estudiantes = Estudiante::paginate();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Muestra el formulario para crear un nuevo estudiante.
     */
    public function create()
    {
        $estudiante = new Estudiante();
        return view('estudiantes.create', compact('estudiante'));
    }

    /**
     * Almacena un nuevo estudiante en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate(Estudiante::$rules);

        // Crear el estudiante
        $estudiante = Estudiante::create($request->all());
        $estudiante->numero_id = (int) $request->input('numero_id'); // Asegurar tipo entero
        $estudiante->save();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante insertado correctamente.');
    }

    /**
     * Muestra el formulario para editar un estudiante existente.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id); // findOrFail para manejar errores si no existe
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Actualiza un estudiante en la base de datos.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        // Validar la solicitud
        $request->validate(Estudiante::$rules);

        // Actualizar el estudiante
        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Elimina un estudiante de la base de datos.
     */
    public function destroy($id)
    {
        // Buscar y eliminar el estudiante
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado correctamente.');
    }
}
