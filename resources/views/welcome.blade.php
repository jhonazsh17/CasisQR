@extends('base-uno')

@section('container')
    
    <div class="row">
        <div class="col-12 text-center">
            <br>
            <img src="{{ asset('img/micaela-bastidas.jpg') }}" alt="" style="opacity: .5" width="100px">
            <br><br>
            <h4 >I. E. MICAELA BASTIDAS 14917</h4>
            <p style="margin-top: 3em"><h6>Escanea tu <b>CADI QR</b>, para registrar tu ingreso a la Institución.</h6></p>


            <a class="btn btn-primary" style="margin-top: 1em; color: white" href="/scan">
                <span class="icon-camera" style="font-size: 2em;"></span><br>
                <b>Escanear CADI QR</b>
            </a>
            <p style="margin-top: 1em">
                <small>Si necesitas Ayuda, <a href="">¡Haz click Aquí!</a></small>
            </p>

            <p style="color:red"><small>Recuerda que tu <b>CADI QR</b>, es intransferible.</p>
        </div>
    </div>

@endsection
