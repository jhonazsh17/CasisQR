<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Registro;

class ScanController extends Controller
{
    public function scan(){
    	return view('scan');
    }

    public function scanExito($dni, $nombres, $es){
    	$nombres = $nombres;
    	$dni = $dni;
    	$eso = "";

    	if($es=="ingreso"){
    		$eso = "Ingresó a la";
    	}else{
    		$eso = "Salió de la";
    	}	

    	return view('scan-exito', compact('dni','nombres','eso'));
    	    
    }

    

    public function registroIngreso(Request $request){

        //convertir imagen
        $image = $this->base64_to_image($request->foto);

        //filename
        $filename = $request->data[0].'-'.$request->data[1].'-'.date('dmYHis').'-'.str_random(10).'.'.'jpg';
        
        //consulta si ya esta el registro
    	$registro = Registro::where('dni', $request->data[1])
                    ->where('estado_asistencia', 1)
    				->first();

    	if($registro){

            $filename =  'OUT-'.$filename;
    		
    		$registro->estado_asistencia = 0;
			$registro->exit_at = date("Y-m-d H:i:s");
			$registro->foto_out = $filename;
    		$registro->save();            

            Storage::disk('public')->put($filename, $image);

    		return json_encode($registro);
    		
    	}else{
            $filename =  'IN-'.$filename;

    		Registro::create([
	    		"nombres"=>$request->data[0],
	    		"dni"=>$request->data[1],
				"estado_asistencia"=>1,
				"foto_in"=>$filename
	    	]);	

	    	$reg = Registro::all()->last();

            Storage::disk('public')->put($filename, $image);

	    	return json_encode($reg);
	    		
    	}
    	
    }	

    public function base64_to_image( $base64_string ) {
        $image = $base64_string;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $image = base64_decode($image);
        return $image;
    }

    
}
