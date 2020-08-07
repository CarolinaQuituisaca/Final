@extends('plantilla')

@section('contentadm')
<p>Administración de los catalogos</p>
    <table id='tabproducto' class='table table-hover'>
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>NOMBRE</th>
                <th>CATÁLOGO</th>
                <th>TAMAÑO</th>
                <th>COLOR</th>
                <th>PRECIO UNITARIO</th>
                <th>GANANCIA</th>
                <th>DESCRIPCIÓN</th>
                

            </tr>
        </thead>
        <tbody>
            @foreach($producto as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->catalogo_id}}</td>
                    <td>{{$item->tamano}}</td>
                    <td>{{$item->color}}</td>
                    <td>{{$item->precio}}</td>
                    <td>{{$item->ganancia}}</td>
                    <td>{{$item->descripcion}}</td>
                </tr>
                
            @endforeach()
        </tbody>
     
    </table>  
          <script>
              $('#tabproducto tr').on('click',function(){
                  $('#elcat').attr('disabled',false);
                  $('#mdcat').attr('disabled',false);
                  var value=$(this).find('td:first').html();
                  var nombre=$(this).find('td:eq(1)').html();
                  var categoria_id=$(this).find('td:eq(2)').html();
                  var descripcion=$(this).find('td:eq(3)').html();
                  var enlace=$(this).find('td:eq(4)').html();
                  var inicioFact=$(this).find('td:eq(5)').html();
                  var finFact=$(this).find('td:eq(6)').html();
                  var archivo=$(this).find('td:eq(7)').html();
                  var val2='¿Esta seguro de eliminar el producto'+value+'?';
                  var val3='¿Esta seguro de modificar el producto '+value+'?';
                  $('#did').val(value);
                  $('#mid').val(value);
                  $('#pp').val(val2);
                  $('#pp2').val(val3);
                  $('#pnombre').val(nombre);
                  $('#pcatalogo_id').val(categoria_id);
                  $('#ptamano').val(descripcion);
                  $('#pcolor').val(enlace);
                  $('#pprecio').val(inicioFact);
                  $('#pganancia').val(finFact);
                  $('#pdescripcion').val(archivo);
              });
              $(document).ready(function () {
                $('#demolist a').on('click', function () {
                var txt= ($(this).text());
                $('#catalogo_id').val(txt);
                });
            });
            $(document).ready(function () {
                $('#demolist2 a').on('click', function () {
                var txt= ($(this).text());
                $('#pcatalogo_id').val(txt);
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
              <form name=eliminar action="{{ route('producto.eliminar')}}" method="GET">
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
                <h4 class="modal-title">Agregar nuevo producto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form action="{{ route('producto.agregar')}}" class="modal-content"  method="GET">
                    @csrf
                        <label for="uname"><b>Nombre: </b></label>
                        <input type="text" name="nombre" required>
                      
                        <label for="uname"><b>Catálogo: </b></label>
                        <div class="input-group">                                            
                            <input type="text" id="catalogo_id" name="catalogo_id" Class="form-control" required></input>
                            <div class="input-group-btn">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul id="demolist" class="dropdown-menu">
                                @foreach($catalogo as $item)
                                <li><a href="#">{{$item->id}}</a></li>
                                @endforeach()
                                </ul>
                            </div>
                        </div>

                        
                        <label for="uname"><b>Talla: </b></label>
                        <input type="text" name="tamano" required>
                        <label for="uname"><b>Color: </b></label>
                        <input type="text" name="color" required></input>
                        <label for="uname"><b>Precio unitario: </b></label>
                        <input type="number" name="precio" required></input>
                        <label for="uname"><b>Ganancia: </b></label>
                        <input type="number" name="ganancia" required>
                        <label for="uname"><b>Descripción: </b></label>
                        <input type="text" name="descripcion" required>
                      
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
              <form action="{{ route('producto.editar')}}" class="modal-content"  method="GET">
                    @csrf
                        <input id="mid" name="mid" type="hidden" required></input>
                        <label for="uname"><b>Nombre: </b></label>
                        <input type="text" name="pnombre" id="pnombre" required>
                      
                        <label for="uname"><b>Categoría: </b></label>
                        <div class="input-group">                                            
                            <input type="text" id="pcatalogo_id" name="pcatalogo_id" Class="form-control"></input>
                            <div class="input-group-btn">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul id="demolist2" class="dropdown-menu">
                                @foreach($catalogo as $item)
                                <li><a href="#">{{$item->id}}</a></li>
                                @endforeach()
                                </ul>
                            </div>
                        </div>

                        <label for="uname"><b>Talla: </b></label>
                        <input type="text" name="ptamano" id="ptamano" required>
                        <label for="uname"><b>Color: </b></label>
                        <input type="text" name="pcolor" id="pcolor" required></input>
                        <label for="uname"><b>Precio unitario: </b></label>
                        <input type="number" name="pprecio" id="pprecio" required></input>
                        <label for="uname"><b>Ganancia: </b></label>
                        <input type="number" name="pganancia" id="pganancia" required>
                        <label for="uname"><b>Descripción: </b></label>
                        <input type="text" name="pdescripcion" id="pganancia" required>
                      
                      
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