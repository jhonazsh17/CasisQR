<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Excel;
use Importer;

use Registro;


class ImportController extends Controller
{
    public function importForm(){
    	return view('import');
    }

    public function importExcel(Request $request){
    	$path = $request->file('excel')->getRealPath();
    	$excel = Importer::make('Excel');
		$excel->load($path);
		$collection = $excel->getCollection();

		return view('list', compact('collection'));
    }

    public function exportExcel(){
        Excel::create('Laravel Excel', function($excel) { 
            $excel->sheet('Productos', function($sheet) { 
                $products = Registro::all(); 
                $sheet->fromArray($products); 
            });
        })->download('xls');
    }
}
