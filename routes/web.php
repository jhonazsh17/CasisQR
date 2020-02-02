<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('qr-code', 'QrController@qrGenerator');
Route::get('import', 'ImportController@importForm');
Route::get('scan', 'ScanController@scan');
Route::get('scan/exito/{dni}/{nombres}/{es}', 'ScanController@scanExito');

Route::post('registro/ingreso', 'ScanController@registroIngreso');
Route::post('import-excel', 'ImportController@importExcel');
Route::get('export','ImportController@exportExcel');

Route::get('genera-pdf/{nombres}/{dni}/{nivel}','PDFController@generaPDF');
Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::get('/admin/registro-docentes', 'AdminController@registroDocentes');
Route::get('/admin/escaner', 'AdminController@escanner');
Route::post('/admin/escaner/prueba', 'AdminController@escannerPrueba');

Route::get('/home', 'HomeController@index')->name('home');
