<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Boleta;
use App\Casas;

class CasosController extends Controller
{
    public function crearboleta(Request $request){
   		$boletaA = new Boleta;
   		$boletaCP = new Boleta;

   		$boletaA->nombre = $request->nombre;
   		$boletaA->apellido1 = $request->apellido1;
   		$boletaA->apellido2 = $request->apellido2;
   		$boletaA->provincia = $request->provincia;
   		$boletaA->canton = $request->canton;
   		$boletaA->distrito = $request->distrito;
   		$boletaA->telefono = $request->telefono;
   		$boletaA->cedula = $request->cedula;
   		$boletaA->nacionalidad = $request->nacionalidad;
   		$boletaA->edad = $request->edad;
   		$boletaA->ocupacion = $request->ocupacion;

		//LAS VARIABLES DE LA CONTRAPARTE SON IGUALES PERO CON LAS LETRAS CP AL INICIO
   		$boletaCP->nombre = $request->cpnombre;
   		$boletaCP->apellido1 = $request->cpapellido1;
   		$boletaCP->apellido2 = $request->cpapellido2;
   		$boletaCP->provincia = $request->cpprovincia;
   		$boletaCP->canton = $request->cpcanton;
   		$boletaCP->distrito = $request->cpdistrito;
   		$boletaCP->telefono = $request->cptelefono;
   		$boletaCP->cedula = $request->cpcedula;
   		$boletaCP->nacionalidad = $request->cpnacionalidad;
   		$boletaCP->edad = $request->cpedad;
   		$boletaCP->ocupacion = $request->cpocupacion;
      $boletaCP->observaciones = $request->cpobservaciones;

        $boletaA::save();
        $boletaCP::save();

   }


   //Muestra la informacion de las boletas en la pagina principal del admin
   public function boletasInicio(){ 
   		$boletas = Boleta::where('tipo',1)->get();
      foreach($boletas as $boleta){
        $boleta->casa;
        $boleta->estado;
        $boleta->clasificacion;
      }
   		return view('dashboard.casos', ['datos' => $boletas]);
   }

   public function validatePartA(Request $request){
      $this->validate($request, [
        'nombre'=>'required|string',
        'apellido1'=>'required|string',
        'apellido2'=>'required|string',
        //'provincia'=>'required|string',
        //'canton'=>'required|string',
        //'distrito'=>'required|string',
        'telefono'=>'required|numeric',
        'cedula'=>'required|numeric',
        //'nacionalidad'=>'required|string',
        //'edad'=>'required|string',
        //'ocupacion'=>'required|string',
        ]);

      return response()->json(["status"=>"ok"]);
    }
}
