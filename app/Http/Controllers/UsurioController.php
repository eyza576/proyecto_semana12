<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usurio;

class UsurioController extends Controller
{
    //
    public function __construct()
    {
        //$this->UsurioRepository = $usurioRepo;
    }

    public function index(Request $request)
    {
        //$usurios = $this->UsurioRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vueusurio.index',compact( 'mensajeeloquent'));
    }

    public function lista(Request $request)
    {
        $usurio =Usurio::all();
        return $usurio;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $usurio = new Usurio();
        $usurio->apellido= $request->apellido;
        $usurio->nombre= $request->nombre;
        $usurio->usurio= $request->usurio;
        $usurio->password= $request->password;
        $usurio->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $usurio = Usurio::findOrFail($request->idusurio);
        return $usurio;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $usurio = Usurio::findOrFail($request->idusurio);
        $usurio->apellido= $request->apellido;
        $usurio->nombre= $request->nombre;
        $usurio->usurio= $request->usurio;
        $usurio->password= $request->password;
        $usurio->save();

        return $usurio;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $usurio = Usurio::destroy($request->idusurio);
        return $usurio;
        //Esta función obtendra el $usurio de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}

