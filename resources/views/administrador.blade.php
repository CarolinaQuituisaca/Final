@extends('plantilla')

@section('contentadm')
      <div class="tab-content">
        <div class="tab-pane container active" id="menu1">
          <p>Administración de las categorías</p>
          <table id='tabcategoria' class='table table-hover'>
                    <thead>

                    <tr>

                    <th>CÓDIGO</th>
                    <th>NOMBRE</th>
                    <th>DETALLE</th>
                    </tr>
                    </thead>
                    
                        <tbody>
                        @foreach($categorias as $item)
                        <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->detalle}}</td>
                        </tr>
                        @endforeach()
                        </tbody>
                    
          </table>

          <script>
              $('#tabcategoria tr').on('click',function(){
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
                <!-- Boton para agregar-->
            <div class="col-2">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id00" style="width:auto;">AGREGAR</button>
              </div>
                <!-- Boton para modificar-->
            <div class="col-2">
              <button id="mdcat" class="btn btn-primary" data-toggle="modal" data-target="#id01" disabled style="width:auto;">MODIFICAR</button>
            </div>
                <!-- Boton para eliminar-->
            <div class="col-2">
              <form name=eliminar action="{{ route('categoria.eliminar')}}" method="GET">
                <input id="did" name="did" type="hidden" required></input>
                  <div class="container">
                    <button id="elcat" type="submit" class="btn btn-primary" disabled onclick="return confirm(''+document.getElementById('pp').value);" style="width:auto;">ELIMINAR</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>    
          

        <!--Ingreso Categorías-->
        <div class="modal fade" id="id00" role="dialog">
          <div class="modal-dialog">
            <!--div id="id00" class="modal-dialog modal-sm"-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Agregar nueva categoría</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form action="{{ route('categoria.agregar')}}" class="modal-content"  method="POST">
                    @csrf
                        <label for="uname"><b>Nombre: </b></label>
                        <input type="text" name="nombre" required>
                      
                        <label for="psw"><b>Descripción: </b></label>
                        <input type="text" name="detalle" required>
                      
                        <button type="submit" class="btn btn-outline-secondary">Guardar</button>
                   
                </form>
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!--Modificar Categorías-->
        <div class="modal fade" id="id01" role="dialog" >
          <div class="modal-dialog">
            <!--div id="id00" class="modal-dialog modal-sm"-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Modificar categoría</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form action="{{ route('categoria.editar')}}" class="modal-content"  method="GET">
                    @csrf
                    <input id="mid" name="mid" type="hidden" required></input>
                    <label for="uname"><b>  Nombre: </b></label>
                    <input type="text" name="nombrem" id="mnombre" required>
                    <label for="psw"><b>  Descripción:</b></label>
                    <input type="text" name="detallem" id="mdetalle" required>
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