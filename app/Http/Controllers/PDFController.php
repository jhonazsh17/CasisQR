<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use QrCode;

class PDFController extends Controller
{
    public function generaPDF($nombres, $dni, $nivel){
    	$qr = QrCode::size(300)->color(128, 25, 230)->generate($nombres." / ".$dni." / ".$nivel);

    	$data = ['nombres' => $nombres, 'dni' => $dni, 'nivel'=>$nivel, 'qr' => $qr];
    	$customPaper = array(0,0,320,200);
        $pdf = PDF::loadView('MyPDF', $data)->setPaper($customPaper, 'landscape');


  
        return $pdf->stream($dni.'-'.$nombres.'.pdf');
    }
}
