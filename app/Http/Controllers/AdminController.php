<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Registro;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('admin.home');
    }

    public function registroDocentes(){
    	$registro = Registro::orderBy('created_at', 'desc')->get();
    	return view('admin.registro', compact('registro'));
    }

    public function escanner(){
    	return view('admin.escanner');
    }

    public function escannerPrueba(Request $request){
    	return $request;
    }
}
