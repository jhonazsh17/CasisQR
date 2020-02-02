@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        	<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{url('/admin')}}"><span class="icon-home"></span> Panel Principal</a></li>
			    <li class="breadcrumb-item"><a href="#">Escáner QR</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Probar Escáner</li>
			  </ol>
			</nav>

            <div class="card">
                <div class="card-header">
                	<h5><b>Probar Escáner</b></h5>                	
                </div>
                <div class="card-body">
                	<div class="row">
    					<div class="col-12">
    						
    						<div class="row" id="cadi" >
							    <div class="col-5">
								      <h3>Escanea CADI QR</h3>
								      <p style="margin-bottom: 5px">Colocar <b>CADI QR</b> en frente de la camara web para ser escaneado.</p>

								      <!-- <div style="margin-bottom: 10px">
								      	<button class="btn btn-dark btn-sm" onclick="refrescar()"><span class="icon-loop2"></span> &nbsp;Refrescar Video</button>
								      </div> -->
								      <div id="loadingMessage">🎥 No se puede acceder a video stream (Porfavor asegurate de tener una camara web activa)</div>
								      <canvas id="canvas" hidden style="width: 100%; border: 10px solid #0bff12;border-radius: 5px;"></canvas>
								      {{ csrf_field() }}
							    </div>
							    <div class="col-7 border-left">
								      <p><b>Capturas.</b></p>
								      <p>Aquí se muestra todas las capturas, data y tiempo en que responde el servidor, para testear Escáner de QR.</p>
								      <img id="snapshot" style="background: #badfff; border:1px solid #6a8586" src="{{ asset('img/logo-jec.png') }}" width="100%" hidden="hidden"> 
								      <div id="load"></div>
								      <div id="output" hidden>
								        <div id="outputMessage"></div>
								        <div hidden><b>Data:</b> <span id="outputData"></span></div>
								      </div>

								      <table class="table table-bordered table-condensed table-striped">
								      	<thead>
								      		<tr>
								      			<th style="text-align: center">Captura</th>
								      			<th style="text-align: center">Data</th>
								      			<th style="text-align: center">Tiempo de Respuesta</th>
								      		</tr>
								      	</thead>
								      	<tbody id="tbody">
								      		<tr id="sal">
								      			<td colspan="3" style="text-align: center">
								      				No hay Capturas Aún.
								      			</td>
								      		</tr>
								      	</tbody>
								      </table>

							    </div>
							    
							</div>
      
				  		</div>

					  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{asset('js/jsQR.js')}}"></script>
<script src="{{asset('js/Tone.js')}}"></script>

<script>

    var video = document.createElement("video");
    var canvasElement = document.getElementById("canvas");
    var canvas = canvasElement.getContext("2d");
    var loadingMessage = document.getElementById("loadingMessage");
    var outputContainer = document.getElementById("output");
    var outputMessage = document.getElementById("outputMessage");
    var outputData = document.getElementById("outputData");
  
    var captureButton = document.getElementById('capture');

    function refrescar(){
    	
    }

    function capturePicture(){
      var canvas = document.getElementById("canvas");
      var ctx = canvas.getContext("2d");

      var url = canvas.toDataURL();
      var img = document.getElementById("snapshot");
      img.src = url;
    }

    function generateSound(){
      //create a synth and connect it to the master output (your speakers)
      var synth = new Tone.Synth().toMaster();

      //play a middle 'C' for the duration of an 8th note
      synth.triggerAttackRelease('E6', '8n');
    }

    function drawLine(begin, end, color) {
      canvas.beginPath();
      canvas.moveTo(begin.x, begin.y);
      canvas.lineTo(end.x, end.y);
      canvas.lineWidth = 4;
      canvas.strokeStyle = color;
      canvas.stroke();
    }

    function videoRun(){
    	// Use facingMode: environment to attemt to get the front camera on phones
	    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
	      video.srcObject = stream;
	      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
	      video.play();
	      requestAnimationFrame(tick);
	    });
    }

    videoRun();

    bandera=0;
    mseg=0;

    function tick() {
      loadingMessage.innerText = "Cargando video..."
      
      if(video.readyState === video.HAVE_ENOUGH_DATA){
        loadingMessage.hidden = true;
        canvasElement.hidden = false;
        outputContainer.hidden = false;
        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

        var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
        var code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: "dontInvert",
        });

        if(code && bandera==0){
          
          generateSound();
          capturePicture();
          video.muted = true;
          //canvasElement.hidden = true;
          //$('#cadi').hide();
          var img = document.getElementById("snapshot");

          var data = {
            nombre:code.data
          };

          var datos = data.nombre.split(" / ");
          

          $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-Token': $('input').val(),
            },
            dataType: 'JSON',
            url: '{{ url("/admin/escaner/prueba") }}',
            data: {data: datos, foto:" "+img.src},
            beforeSend: function(){

              timer();
            },
            success: function(data){
              console.log(data);
              $('#sal').hide();
              $('#tbody').append('<tr ><td style="vertical-align:middle"><img src="'+data.foto+'" width="150px" style="vertical-align:middle"></td><td style="vertical-align:middle">'+data.data+'</td><td style="vertical-align:middle; text-align:center">'+mseg+' ms</td></tr>'); 
            }
          });

          // bandera = 1;

          drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FFFFFF");
          drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FFFFFF");
          drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FFFFFF");
          drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FFFFFF");

          outputMessage.hidden = true;
          outputData.parentElement.hidden = false;
          outputData.innerText = code.data;

        }else{
          outputMessage.hidden = false;
          outputData.parentElement.hidden = true;
        }
      }
      requestAnimationFrame(tick);
    }

    function timer(){
    	setTimeout(function(){
    		mseg = mseg + 1;
    		timer();
    	}, 1);
    }

    
  </script>

@endsection