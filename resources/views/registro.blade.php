@extends('base-uno')

@section('container')

  <div class="row">
    <div class="col-12" style="height:500px; overflow-y:scroll">
      <h3>Registro Asistencia <small>Historial de Asistencia</small></h3>
      <table class="table" id="table">
        <thead>
          <tr>
            <th class="text-center" style="font-size:.9em">Nº</th>
            <th class="text-center" style="font-size:.9em">PERSONAL</th>
            <th class="text-center" style="font-size:.9em">DNI</th>
            <th class="text-center" style="font-size:.9em">HORA INGRESO</th>
            <th class="text-center" style="font-size:.9em">FOTO INGRESO</th>
            <th class="text-center" style="font-size:.9em">HORA SALIDA</th>
            <th class="text-center" style="font-size:.9em">FOTO SALIDA</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=0; ?>
          @foreach($registro as $reg)
          <tr style="font-size:.9em">
            <td class="text-center" style="vertical-align:middle">{{$i=$i+1}}</td>
            <td style="vertical-align:middle"><span class="icon-user2"></span> {{$reg->nombres}}</td>
            <td class="text-center" style="vertical-align:middle">{{$reg->dni}}</td>
            <td class="text-center" style="vertical-align:middle"><span class="icon-arrow-down-left"></span> <span class="badge badge-pill badge-warning">{{$reg->created_at}} </span></td>
            <td class="text-center" style="vertical-align:middle">
              <img src="{{asset('storage/uploads')}}/{{$reg->foto_in}}" alt="" width="100px" style="border: 3px solid #7de010; border-radius: 3px;">
            </td>
            <td class="text-center" style="vertical-align:middle">
              @if($reg->exit_at==null)
              <span class="icon-history"></span> <span class="badge badge-pill badge-danger">Pendiente</span>
              @else
                <span class="icon-arrow-up-right"></span> <span class="badge badge-pill badge-dark">{{$reg->exit_at}} </span>
              @endif
            </td>
            <td class="text-center" style="vertical-align:middle">
              <img src="{{asset('storage/uploads')}}/{{$reg->foto_out}}" alt="" width="100px" style="border: 3px solid #7de010; border-radius: 3px;">
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="border-top">
    <br>
    <b>Acciones:</b> &nbsp;&nbsp;<a class="btn btn-warning" onclick="imprimir()">Imprimir</a>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    function getDataOfTable(){
      let data = '{{$reg}}';
      console.log(data);
    }

    function imprimir(){
      getDataOfTable();
      var wb = XLSX.utils.book_new();
      wb.Props = {
                Title: "SheetJS Tutorial",
                Subject: "Test",
                Author: "Red Stapler",
                CreatedDate: new Date(2017,12,19)
        };
      wb.SheetNames.push("Test Sheet");
      var ws_data = [['N°' , 'NOMBRES Y APELLIDOS', 'DNI', 'HORA DE INGRESO', 'HORA DE SALIDA']];  //a row with 2 columns
      var ws = XLSX.utils.aoa_to_sheet(ws_data);
      wb.Sheets["Test Sheet"] = ws;
      var wbout = XLSX.write(wb, {bookType:'xlsx',  type: 'binary'});      
      saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'test.xlsx');
    }   

    function s2ab(s){
      var buf = new ArrayBuffer(s.length); //convert s to arrayBuffer
      var view = new Uint8Array(buf);  //create uint8array as viewer
      for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF; //convert to octet
      return buf; 
    } 
  </script>
@endsection

