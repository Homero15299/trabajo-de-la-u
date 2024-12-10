<?php

namespace App\Http\Controllers;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Psy\Command\EditCommand;

class estudianteController extends Controller
{
    public function index()

    {  
        $estudiantes = Estudiante::paginate();
        return view('estudiantes.index', compact('estudiantes'));

    }

    public function create()

    {
        $estudiante = new Estudiante();

        return view('estudiantes.create', compact('estudiante'));
    }


    public function store (Request $request)

    {
        
        request()->validate(Estudiante::$rules); 


        $estudiante = Estudiante::create($request->all());
        $estudiante->numero_id = (int) $request->input('numero_id'); // Convertir a entero

        

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante insertado correctamente');
    }
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        return view('estudiantes.edit',compact('estudiante'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        request()->validate(Estudiante::$rules);
        $estudiante->update($request->all());

        return redirect()->route('estdiantes.index')
        ->with('success', 'estudiante actualizao correctamente');
    }
    
    public function destroy($id){
            $estudiantes = Estudiante::find($id)->delete();


            return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante expulsado correctamente');
    }

    

}
