<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<!-- link cdn -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
	<div class="container">
		<br>
		<div class="row">
			<div class="text-center">
				<h1>QR Asistencia <small> - I. E. Micaela Bastidas 14917</small></h1>
			</div>
		</div>
	</div>
	<div class="container">
		<br>
		<div class="row">
			<div class="col-2" style="padding-left: 0">
				<ul class="nav flex-column">
				  <li class="nav-item">
				    <a class="nav-link" href="/import">Generar CADI QR</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="/scan">Scan CADI QR</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="/registro">Registro Asistencia</a>
				  </li>
				  
				</ul>
				

				<div class="text-center" style="margin-top: 1em">
					<p style="color: #8d8d8d"><b>I. E. MICAELA BASTIDAS 14917</b></p>
					<img src="{{ asset('img/micaela-bastidas.jpg') }}" alt="" style="opacity: .5">
				</div>
				
			</div>
			<div class="col-10 border-left" >
				@yield('container')
				
			</div>
		</div>
	</div>
	
	
	<footer class="container border-top">
		<div class="row">
			<div class="col-12 text-center" style="color:#bbb">
			<br>
				----- Desarrollado por @Jhonazsh -----
			</div>
		</div>
	</footer>
	

    <!-- link cdn - no recomendado -->
	<script src="{{asset('js/jquery.js')}}"></script>
	
	<script src="{{asset('js/bootstrap.js')}}"></script>

	@yield('scripts')
</body>
</html>