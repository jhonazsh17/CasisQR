@extends('base')

@section('container')
<div style="height:500px">

	<h3>Generar CADI QR <small>/ Importar Archivo</small></h3>

	<p>
		Solo es permitido importar archivos en formato excel. Para los demas tipos de archivos no funciona el aplicativo.
	</p>

	<form method="post" action="{{url('import-excel')}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="file" name="excel">
		<br>
		<input type="submit" value="Importar Archivo" class="btn btn-warning" style="margin-top: 1em">
	</form>
	</div>
@endsection