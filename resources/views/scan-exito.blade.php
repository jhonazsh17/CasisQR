@extends('base-uno')

@section('container')
	<div class="row">
  		<div class="col-12 text-center">
        <div style="background-color: #ececec; width: 80%; margin: 0 auto; padding: .5em; border-radius: 5px">
          <h1>{{$nombres}}</h1>
          <h2>{{$dni}}</h2>
        </div>
  			
  			<br>
        <div style="background-color: yellow; width: 600px; margin: 0 auto; padding: .5em; border-radius: 5px"> 
          <h3>{{$eso}} Institucion Educativa.</h3>
        </div>
  			
        <br>  
  			<a href="/registro"">Ir a Registro Asistencia</a>
  			-
  			<a href="/scan">Ir Escanear</a>
  			<br>
  		</div>			
  	</div>
@endsection