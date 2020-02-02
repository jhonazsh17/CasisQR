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
			<div class="col-12 text-center border-bottom">
				<h1 style="font-family: monospace; font-weight: bold"><span style="color:#9ec5de; text-decoration: underline;">C</span>ontrol de <span style="color: #9ec5de; text-decoration: underline;">Asis</span>tencia <span style="background-color: black; padding: 3px; color: white;">QR</span></h1>
			</div>			
		</div>
	</div>
	<div class="container" style="padding-top: 1em">
		@yield('container')
	</div>
	<br>
	
	<footer class="container border-top">
		<div class="row">
			<div class="col-12 text-center" style="color:#bbb; padding-top: 1em">
				
				Desarrollado por <b>@Jhonazsh</b> para I. E. Micaela Bastidas
				<div>Casis <span style="background-color: #ccc; padding: 1px; color: white">QR</span></div>
				
			</div>
		</div>
	</footer>
	

    <!-- link cdn - no recomendado -->
	<script src="{{asset('js/jquery.js')}}"></script>
	
	<script src="{{asset('js/bootstrap.js')}}"></script>

	<script src="{{asset('js/xlsx.full.min.js')}}"></script>
	<script src="{{asset('js/FileSaver.min.js')}}"></script>

	@yield('scripts')
</body>
</html>