<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
class profesoresController extends Controller
{
    public function index()

    {  
        $profesores = Profesor::paginate();
        return view('profesores.index', compact('profesores'));

    }

    public function create()

    {
        $profesores = new Profesor();

        return view('profesores.create', compact('profesores'));
    }


    public function store (Request $request)

    {
        request()->validate(Profesor::$rules); 


        $profesor = Profesor::create($request->all());

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor insertado correctamente');
    }

    public function edit($id)
    {
        $profesor = Profesor::find($id);
       // dd($profesor);
        return view('profesores.edit',compact('profesor'));
    }

    public function update(Request $request, Profesor $profesor)
    {
        request()->validate(Profesor::$rules);
        $profesor->update($request->all());
        //var_dump($request);
        
        return redirect()->route('profesores.index')
    ->with('success', 'profesor actualizao correctamente');

    }
    
    public function destroy($id){
            $profesor = Profesor::find($id)->delete();


            return redirect()->route('profesores.index')
            ->with('success', 'Profesor expulsado correctamente');
    }
}
