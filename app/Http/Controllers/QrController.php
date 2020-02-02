<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrCode;

class QrController extends Controller
{
    public function qrGenerator(Request $request){
    	$qr = QrCode::size(200)->color(128, 25, 230)->generate($request['data']['nombre']." / ".$request['data']['dni']." / ".$request['data']['nivel']);

    	return json_encode($qr);
    }
}
