<!DOCTYPE html>
<html>
<head>
	<title>Hi</title>
	<style type="text/css">
		html { margin: 10px 10px; font-size: .63em}
	</style>
</head>
<body>
	<h5><center>I.E. MICAELA BASTIDAS - 14917</center></h5><BR>	
	<p ><center><B>CARNET ASISTENCIA DIGITAL E INTRANSFERIBLE</B></center></p>
	<p><center><b>NOMBRES:<b></center></p>
	<p><center>{{$nombres}}</center></p>
	<p><center><b>DNI:</b></center></p>
	<p><center>{{$dni}}</center></p>
	<p><center><b>NIVEL:</b></center></p>
	<p><center>{{$nivel}}</center></p>
	<p>
		<center>
			<img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(177)->generate($nombres." / ".$dni)) }} ">
		</center>
	</p>
</body>
</html>