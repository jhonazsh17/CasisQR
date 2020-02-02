@extends('base')

@section('container')
	<div class="row">
  				<div class="col-9">
  					<h3>Generar CADI QR <small>/ Lista de Datos Importados</small></h3>
  					<br>
  					<table class="table">
						<thead>
							<tr style="font-size: .8em">
								<th class="text-center">NOMBRE</th>
								<th class="text-center">DNI</th>
								<th class="text-center">NIVEL</th>
								<th class="text-center" style="width: 150px">OPCIONES</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=0; ?>
							@foreach($collection as $item)
								@if($i>1)
								<tr style="font-size: .8em">
									<td style="vertical-align: middle;">
										{{$item[1]}}
									</td>
									<td class="text-center" style="vertical-align: middle;">
										{{$item[2]}}
									</td>
									<td class="text-center" style="vertical-align: middle;">
										{{$item[4]}}
									</td>
									<td class="text-center" style="vertical-align: middle;">
										<button type="button" class="btn btn-warning btn-sm" onclick="generarQr('{{$item[1]}}', '{{$item[2]}}', '{{$item[4]}}')" style="font-size: .95em"><b><span class="icon-qrcode"></span> Generar QR</b></button>
									</td>
								</tr>
								@endif
								<?php $i=$i+1; ?>
							@endforeach
						</tbody>
					</table>
  				</div>
  				<div class="col-3">
  					<h4 class="text-center">Imágen de Codigo QR</h4>
  					<div id="qr-show" class="text-center">
  						<br>
						<p class="text-center">No hay nada para mostrar.</p>
					</div>
					<div id="qr-print" class="text-center" style="display: none">
						<a class="btn btn-dark btn-sm" id="qr-link" target="_blank" href="{{url('/genera-pdf')}}"> <b><span class="icon-printer2"></span> Imprimir</b></a>
					</div>
  				</div>
  			</div>
@endsection

@section('scripts')

	<script>
		
		function generarQr(nombre, dni, nivel){

			var data = {
				nombre:nombre,
				dni:dni,
				nivel: nivel
			};

			$.ajax({
				type:'GET',
				dataType: 'JSON',
				url: '{{ url("/qr-code") }}',
				data: {data: data},
				beforeSend: function(){
					$('#qr-show').html('<br>Cargando ...');
					$('#qr-print').hide();
				},
				success: function(data){
					$('#qr-show').html(data);
					$('#qr-print').show();
					$('#qr-link').attr('href','{{url("/genera-pdf")}}/'+nombre+'/'+dni+'/'+nivel);
				}
			})
		}
		

	</script>

@endsection