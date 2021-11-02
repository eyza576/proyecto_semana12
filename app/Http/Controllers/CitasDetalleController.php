<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CitasDetalle;

class CitasDetalleController extends Controller
{
    //
    public function __construct()
    {
        //$this->CitasDetalleRepository = $citasdetalleRepo;
    }

    public function index(Request $request)
    {
        //$citasdetalles = $this->CitasDetalleRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vuecitasdetalle.index',compact( 'mensajeeloquent'))        ;
    }

    public function lista(Request $request)
    {
        $citasdetalle =CitasDetalle::all();
        return $citasdetalle;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $citasdetalle = new CitasDetalle();
        $citasdetalle->idcita= $request->idcita;
        $citasdetalle->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $citasdetalle = CitasDetalle::findOrFail($request->idcitasdetalle);
        return $citasdetalle;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $citasdetalle = CitasDetalle::findOrFail($request->idcitasdetalle);

        $citasdetalle->idcita = $request->idcita;
        $citasdetalle->save();
        return $citasdetalle;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $citasdetalle = CitasDetalle::destroy($request->idcitasdetalle);
        return $citasdetalle;
        //Esta función obtendra el idCitasDetalle de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}
