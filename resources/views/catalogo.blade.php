@extends('plantilla')

@section('contentadm')
<p>Administración de los catalogos</p>
    <table id='tabcliente' class='table table-hover'>
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>NOMBRE</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>Enlace</th>
                <th>Incio Facturación</th>
                <th>Fin Facturación</th>
                <th>Ganancia</th>
                <th>Archivo</th>
                

            </tr>
        </thead>
        <tbody>
            @foreach($catalogo as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->categoria_id}}</td>
                        <td>{{$item->descripcion}}</td>
                        <td>{{$item->enlace}}</td>
                        <td>{{$item->inicioFact}}</td>
                        <td>{{$item->finFact}}</td>
                        <td>{{$item->ganancia}}</td>
                        <td>{{$item->archivo}}</td>
                    </tr>
                
            @endforeach()
        </tbody>
     
    </table>  
          <script>
              $('#tabcliente tr').on('click',function(){
                  $('#elcat').attr('disabled',false);
                  $('#mdcat').attr('disabled',false);
                  var value=$(this).find('td:first').html();
                  var nombre=$(this).find('td:eq(1)').html();
                  var categoria_id=$(this).find('td:eq(2)').html();
                  var descripcion=$(this).find('td:eq(3)').html();
                  var enlace=$(this).find('td:eq(4)').html();
                  var inicioFact=$(this).find('td:eq(5)').html();
                  var finFact=$(this).find('td:eq(6)').html();
                  var archivo=$(this).find('td:eq(8)').html();
                  var val2='¿Esta seguro de eliminar el catálogo'+value+'?';
                  var val3='¿Esta seguro de modificar el catálogo '+value+'?';
                  $('#did').val(value);
                  $('#mid').val(value);
                  $('#pp').val(val2);
                  $('#pp2').val(val3);
                  $('#tnombre').val(nombre);
                  $('#tcategoria_id').val(categoria_id);
                  $('#tdescripcion').val(descripcion);
                  $('#tenlace').val(enlace);
                  $('#tinicioFact').val(inicioFact);
                  $('#tfinFact').val(finFact);
                  $('#tarchivo').val(archivo);
              });
              $(document).ready(function () {
                $('#demolist a').on('click', function () {
                var txt= ($(this).text());
                $('#categoria_id').val(txt);
                });
            });
            $(document).ready(function () {
                $('#demolist2 a').on('click', function () {
                var txt= ($(this).text());
                $('#tcategoria_id').val(txt);
                });
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
              <form name=eliminar action="{{ route('catalogo.eliminar')}}" method="GET">
                <input id="did" name="did" type="hidden" required></input>
                  <div class="container">
                    <button id="elcat" type="submit" class="btn btn-primary" disabled onclick="return confirm(''+document.getElementById('pp').value);" style="width:auto;">ELIMINAR</button>
                  </div>
              </form>
            </div>
          </div>


        <!--Ingreso Catalogos-->
        <div class="modal fade" id="id00" role="dialog">
          <div class="modal-dialog">
            <!--div id="id00" class="modal-dialog modal-sm"-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo catálogo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form action="{{ route('catalogo.agregar')}}" class="modal-content"  method="GET">
                    @csrf
                        <label for="uname"><b>Nombre: </b></label>
                        <input type="text" name="nombre" required>
                      
                        <label for="uname"><b>Categoría: </b></label>
                        <div class="input-group">                                            
                            <input type="text" id="categoria_id" name="categoria_id" Class="form-control"></input>
                            <div class="input-group-btn">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul id="demolist" class="dropdown-menu">
                                @foreach($categoria as $item)
                                <li><a href="#">{{$item->id}}</a></li>
                                @endforeach()
                                </ul>
                            </div>
                        </div>

                        <label for="uname"><b>Descripción: </b></label>
                        <input type="text" name="descripcion" required>
                        <label for="uname"><b>Enlace: </b></label>
                        <input type="text" name="enlace" required>
                        <label for="uname"><b>Inicio de Facturación: </b></label>
                        <input type="text" name="inicioFact" required value='2020/01/01'></input>
                        <label for="uname"><b>Fin de Facturación: </b></label>
                        <input type="text" name="finFact" required value='2020/01/01'></input>
                        <label for="uname"><b>Archivo: </b></label>
                        <input type="text" name="archivo" required>
                      
                        <button type="submit" class="btn btn-outline-secondary">Guardar</button>
                   
                </form>
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
          <!--Modificar Cliente a administrador o empresaria-->  
        <div class="modal fade" id="id01" role="dialog" >
          <div class="modal-dialog">
            <!--div id="id00" class="modal-dialog modal-sm"-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Modificar catálogo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
              <form action="{{ route('catalogo.editar')}}" class="modal-content"  method="GET">
                    @csrf
                    <input id="mid" name="mid" type="hidden" required></input>
                        <label for="uname"><b>Nombre: </b></label>
                        <input type="text" name="tnombre" id="tnombre" required>
                      
                        <label for="uname"><b>Categoría: </b></label>
                        <div class="input-group">                                            
                            <input type="text" id="tcategoria_id" name="tcategoria_id" Class="form-control"></input>
                            <div class="input-group-btn">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul id="demolist2" class="dropdown-menu">
                                @foreach($categoria as $item)
                                <li><a href="#">{{$item->id}}</a></li>
                                @endforeach()
                                </ul>
                            </div>
                        </div>

                        <label for="uname"><b>Descripción: </b></label>
                        <input type="text" name="tdescripcion" id="tdescripcion" required>
                        <label for="uname"><b>Enlace: </b></label>
                        <input type="text" name="tenlace" id="tenlace" required>
                        <label for="uname"><b>Inicio de Facturación: </b></label>
                        <input type="text" name="tinicioFact" id="tinicioFact" required value='2020/01/01'></input>
                        <label for="uname"><b>Fin de Facturación: </b></label>
                        <input type="text" name="tfinFact" nid="tfinFact"required value='2020/01/01'></input>
                        <label for="uname"><b>Archivo: </b></label>
                        <input type="text" name="tarchivo" id="tarchivo" required>
                      
                        <button type="submit" class="btn btn-outline-secondary">Guardar</button>
                   
                </form>
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
@endsection