<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomina;

class nominasController extends Controller
{
    /**
     * Muestra la lista de nominaes con paginación.
     */
    public function index()
    {  
        $nominas = Nomina::paginate(10); // Ajuste del número de elementos por página
        return view('nominas.index', compact('nominas'));
    }

    /**
     * Muestra el formulario para crear un nuevo nomina.
     */
    public function create()
    {
        $nominas = new Nomina(); // Usamos singular, ya que estamos creando uno
        $nominas = Nomina::with('apellidoProfesor')->get();
        $nominas = Nomina::with('nombreProfesor')->get();
        return view('nominas.create', compact('nominas'));
    }

    /**
     * Almacena un nuevo nomina en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate(Nomina::$rules); // Validación explícita

         $nominas = Nomina::create($request->all());
 
        return redirect()->route('nominas.index')
            ->with('success', ' nomina creada satisfactoriamente.');
    }

    /**
     * Muestra el formulario para editar un nomina existente.
     */
    public function edit($id)
    {
        $nomina = Nomina::find($id);

        // Verificación de existencia
        if (!$nomina) {
            abort(404, 'Nomina no encontrado');
        }

        return view('nominas.edit', compact('nomina'));
    }

    /**
     * Actualiza los datos de un nomina existente.
     */
    public function update(Request $request, $id)
{
    $nomina = Nomina::findOrFail($id);

    // Validación de los campos
    $validated = $request->validate([
        'tipo_vinculacion' => 'required|string|max:255',
        
    ]);

    // Actualización del nomina
    $nomina->update($validated);

    return redirect()->route('nominas.index')->with('success', 'Nomina actualizado correctamente.');
}


    /**
     * Elimina un nomina de la base de datos.
     */
    public function destroy($id)
    {
        $nomina = Nomina::find($id);

        // Verificación de existencia antes de eliminar
        if (!$nomina) {
            abort(404, 'Nomina no encontrado');
        }

        $nomina->delete();

        return redirect()->route('nominas.index')
            ->with('success', 'Nomina eliminado correctamente');
    }
}

