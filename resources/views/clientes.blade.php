@extends('plantilla')

@section('contentadm')
<p>Administración de los clientes</p>
    <table id='tabcliente' class='table table-hover'>
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>NOMBRE</th>
                <th>CONTRASEÑA</th>
                <th>CORREO</th>
                <th>TELEFONO</th>
                <th>ROL</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $item)
                @if($item->role_id=='1')
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->password}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->telefono}}</td>
                        <td>{{$item->role_id}}</td>
                    </tr>
                @endif
            @endforeach()
        </tbody>
     
    </table>  
          <script>
              $('#tabcliente tr').on('click',function(){
                  $('#elcat').attr('disabled',false);
                  $('#mdcat').attr('disabled',false);
                  var value=$(this).find('td:first').html();
                  var nombre=$(this).find('td:eq(1)').html();
                  var detalle=$(this).find('td:eq(2)').html();
                  var val2='¿Esta seguro de eliminar la categoría '+value+'?';
                  var val3='¿Esta seguro de modificar la categoría '+value+'?';
                  $('#did').val(value);
                  $('#mid').val(value);
                  $('#pp').val(val2);
                  $('#pp2').val(val3);
                  $('#mnombre').val(nombre);
                  $('#mdetalle').val(detalle);
              });
          </script>
          
          <div id="prueba">
            <input disabled id="pp" type="hidden"></input>
            <input disabled id="pp2" type="hidden"></input>
          </div>
          <div class="row">
                <!-- Boton para modificar-->
            <div class="col-2">
                <button id="mdcat" class="btn btn-primary" data-toggle="modal" data-target="#id01" disabled style="width:auto;">MODIFICAR</button>
            </div>
                <!-- Boton para eliminar-->
            <div class="col-2">
              <form name=eliminar action="{{ route('cliente.eliminar')}}" method="GET">
                <input id="did" name="did" type="hidden" required></input>
                  <div class="container">
                    <button id="elcat" type="submit" class="btn btn-primary" disabled onclick="return confirm(''+document.getElementById('pp').value);" style="width:auto;">ELIMINAR</button>
                  </div>
              </form>
            </div>
          </div>

          <!--Modificar Cliente a administrador o empresaria-->
        <div class="modal fade" id="id01" role="dialog" >
          <div class="modal-dialog">
            <!--div id="id00" class="modal-dialog modal-sm"-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Modificar cliente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form action="{{ route('cliente.editar')}}" class="modal-content"  method="GET">
                    @csrf
                    <input id="mid" name="mid" type="hidden" required></input>
                    <label for="uname"><b>  Nombre: </b></label>
                    <input type="text" disabled name="nombrem" id="mnombre" required>
                    <label for="psw"><b>  Roles:</b></label>
                    <label class="radio-inline">
                    <input type="radio" name="optradio" checked value='2'>EMPRESARÍA
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="optradio" value='3'>AMINISTRADOR
                    </label>
                    <button type="submit" class="btn btn-primary" onclick="return confirm(''+document.getElementById('pp2').value);">Guardar</button>
                </form>
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
@endsection