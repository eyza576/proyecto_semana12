<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;

class CitasController extends Controller
{
    //
    public function __construct()
    {
        //$this->CitasRepository =$citasRepo;
    }

    public function index(Request $request)
    {
        //$Citass = $this->CitasRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vuecita.index',compact( 'mensajeeloquent'))        ;
    }

    public function lista(Request $request)
    {
       $citas =Citas::all();
        return$citas;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
       $citas = new Citas();
       $citas->idpaciente= $request->idpaciente;
       $citas->fecha= $request->fecha;
       $citas->iddoctor= $request->iddoctor;
       $citas->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
       $citas = Citas::findOrFail($request->idcitas);
        return$citas;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
       $citas = Citas::findOrFail($request->idcitas);

       $citas->idpaciente = $request->idpaciente;
       $citas->fecha = $request->fecha;
       $citas->iddoctor = $request->iddoctor;
       $citas->save();

        return$citas;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
       $citas = Citas::destroy($request->idcitas);
        return$citas;
        //Esta función obtendra el idCitas de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}
