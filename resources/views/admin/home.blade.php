@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h5><b>Panel Principal</b></h5></div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            
                            <div class="media">
                              <img src="{{asset('/img')}}/micaela-bastidas.jpg" class="mr-3" alt="...">
                              <div class="media-body">
                                <h5 class="mt-0">Institución Educativa 14917 Micaela Bastidas</h5>
                                <p class="text-justify" style="margin-bottom: 5px">
                                    Somos una Institución que apuesta por la Excelencia Educativa, encaminada progresivamente hacia la obtención de nuestros objetivos. Convencidos plenamente de que la tecnología es una gran herramienta hacia la Innovación.
                                </p>
                                <div>
                                    <span class="badge badge-warning">Ciencia, Saber y Disciplina.</span>
                                </div>
                                
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h5>¿Qué es Casis QR?</h5>
                                    <div class="text-justify">
                                        <b>Control de Asistencia QR,</b> es un Micro Sistema que permite llevar el control de la asistencia del personal que trabaja en la Institución, además de llevar la asistencia de los alumnos, para la ayuda en toma de distintas decisiones y acciones que conlleven hacia la calidad educativa.
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h5>Así funciona.</h5>
                                    <img src="{{asset('img/Classmate.png')}}" width="100%">
                                </div>
                            </div>
                            
                        </div>  

                        <div class="col-4 border-left">
                            <h5>Acciones Frecuentes</h5>
                            <div>
                                <a href="{{url('/admin/registro-docentes')}}">Registro de Asistencia Docentes</a> / 
                                <a href="">Generar CADI QR</a> / 
                                <a href="{{url('/admin/escaner')}}">Probar Escanner</a>
                            </div>
                            <hr>
                            <h5>
                                Lista de Docentes Inpuntuales
                            </h5>
                            <ul>
                                <li><a href="#" class="badge badge-info">BETTY NUREÑA GUTIERREZ</a></li>
                                <li><a href="#" class="badge badge-info">YONATHAN RUIZ VINCES</a></li>
                                <li><a href="#" class="badge badge-info">JUAN CHAMAYA SILVA</a></li>
                                <li><a href="#" class="badge badge-info">GRECIA AGUILERA BARRIENTOS</a></li>
                                <li><a href="#" class="badge badge-info">LUCY LUNA MORAN</a></li>
                            </ul>
                            <hr>
                            <h5>
                                Lista de Alumnos Impuntuales
                            </h5>

                             <ul>
                                <li><a href="#" class="badge badge-secondary">DAYANE MARQUEZ SUYON</a></li>
                                <li><a href="#" class="badge badge-secondary">NAYELY MOGOLLON ZAPATA</a></li>
                                <li><a href="#" class="badge badge-secondary">ABIGAIL ALCAS FLORES</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
