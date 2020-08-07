@extends('layouts.app')

@section('content')




    <!--PEDIDO-->
    <div class="container">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    

        <form action="{{ route('detalle')}}">
            

            <div class="col-25">
                <div class="container">
                    <h3>Detalles</h3>
                    <div class="row">
                        <div class="col-5">
                            <label for="email"><i class="fa fa-envelope"></i> Código empresaría </label>
                        </div>
                        <div class="col-5">
                            <label for="email"><i class="fa fa-envelope"></i> Código catálogo </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="input-group">
                                
                                <input id="color" name="color" type="hidden" required></input>
                                <input id="talla" name="talla"  type="hidden" required></input>                            
                                <input id="total" name="total" type="hidden" required></input> 
                                <input id="id_pedido" name="id_pedido" type="hidden" required></input>               
                                <input type="text" id="empresaria_id" name="empresaria_id" Class="form-control" required></input>
                                <div class="input-group-btn">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul id="demolist" class="dropdown-menu">
                                    @foreach($users as $item)
                                        @if ($item->role_id=="2")
                                            <li><a href="#">{{$item->id}}</a></li>
                                        @endif
                                    
                                    @endforeach()
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="input-group">                                            
                                <input type="text" id="catalogo_id" name="catalogo_id" Class="form-control" required></input>
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
                        </div>
                    </div>
                    



                    <label for="email"><i class="fa fa-envelope"></i> CÓDIGO PRODUCTO </label>
                    <div class="row">
                        <div class="col-5">
                            
                            <input type="text" id="codProducto" name="codProducto" Class="form-control" required>
                        </div>
                        <div class="col-5">
                            <input type="button" id="buscar" value="Buscar" class="btn btn-secondary">
                            
                        </div>
                        <div class="col-5">
                        </div>
                        <div class="col-5">
                        </div>
                        <div class="col-5">
                            <label for="email"><i class="fa fa-envelope"></i> COLOR </label>
                            <select id="primary"></select>
                        </div>
                        <div class="col-5">
                            <label for="email"><i class="fa fa-envelope"></i> TALLA </label>
                            <select id="secondary"></select>
                        </div>
                        <div class="col-5">
                            <label><i class="fa fa-envelope"></i> PRECIO</label>
                            <input type="text" id="precio" name="precio" disabled >
                        </div>
                        <div class="col-5">
                            <label><i class="fa fa-envelope"></i> NOMBRE</label>
                            <input type="text" id="nombre" name="nombre" disabled>
                        </div>
                        <div class="col-5">
                            <label><i class="fa fa-envelope"></i> CANTIDAD</label>
                            <input type="number" id="cantidad" name="cantidad" Class="form-control" required>
                        </div>
                    </div>

                <script>
                    $(document).ready(function () {
                        $('#buscar').on('click', function () {
                            var test=$('#codProducto').val();
                            var cat=$('#catalogo_id').val();
                            @foreach($producto as $item)
                                //$item->id
                                if (test=={{$item->id}}){
                                    if (cat=={{$item->catalogo_id}}){
                                        $('#nombre').val('{{$item->nombre}}');
                                        $('#precio').val('{{$item->precio}}');
                                        //$('#cantidad').val('{{$item->tamano}}');
                                        var cadenaADividir='{{$item->tamano}}';
                                        var talla = cadenaADividir.split(' ');
                                        var cadenaADividir2='{{$item->color}}';
                                        var color = cadenaADividir2.split(' ');
                                        var options = {
                                            color : color,
                                            talla : talla
                                        }
                                    $(function(){
                                        var fillSecondary = function(){
                                            $('#secondary').empty();
                                            options['talla'].forEach(function(element,index){
                                                $('#secondary').append('<option value="'+element+'" Class="form-control">'+element+'</option>');
                                            });
                                            options['color'].forEach(function(element,index){
                                                $('#primary').append('<option value="'+element+'" Class="form-control">'+element+'</option>');
                                            });
                                            var col =$('#primary').val();
                                            $('#color').val(col);
                                        }
                                        $('#primary').change(fillSecondary);
                                        fillSecondary();
                                    });
                                    $(function(){
                                        var fillSecondary = function(){
                                            
                                            var tal =$('#secondary').val();
                                            $('#talla').val(tal);
                                        }
                                        $('#secondary').change(fillSecondary);
                                        fillSecondary();
                                    });
                                    
                                };};
                            @endforeach()
                            
                        });
                        
                    });
                    
                    $(document).ready(function () {
                        $('#det').on('click', function () {
                            var precio =$('#precio').val();
                            var cant =$('#cantidad').val();
                            var tot=precio*cant;
                            $('#total').val(tot);
                            var idped=1;
                            @foreach($pedido as $item)
                                idped++;
                            @endforeach()
                            $('#id_pedido').val(idped);

                        });
                        
                    });
                    $(document).ready(function () {
                        $('#enviarTotal').on('click', function () {
                            var idPedido =$('#idpedido').val();
                            var total = 0;
                            var aux=0;
                            @foreach($detalle as $item)
                                if (idPedido=={{$item->pedido_id}}){
                                    aux ='{{$item->total}}';
                                    total=total+aux;
                                }
                            @endforeach()
                            $('#totalPedido').val(total);

                        });
                        
                    });
                    
                    

                    $(document).ready(function () {
                        $('#demolist a').on('click', function () {
                        var txt= ($(this).text());
                        $('#empresaria_id').val(txt);
                        });
                    });
                    $(document).ready(function () {
                        $('#demolist2 a').on('click', function () {
                        var txt= ($(this).text());
                        $('#catalogo_id').val(txt);
                        });
                    });

                $('#tabdetalle tr').on('click',function(){
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


                </script>
                    <!-- Aparte -->

        

            </div>
            <input type="submit" id="det" value="Agregar producto" class="btn btn-secondary">
        </form>
    </div>
    </div>

    <div class="col-25">
        <div class="container">
            <h4>Pedido
                <span class="price" style="color:black">
                    <i class="fa fa-shopping-cart"></i>
                </span>
            </h4>

            
            
            <table id='tabdetalle' class='table table-hover'>
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>PRODUCTO</th>
                        <th>COLOR</th>
                        <th>TALLA</th>
                        <th>CANTIDAD</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach($detalle as $item)
                    
                        @if(session('idpedido'))
                            @if(session('idpedido')==$item->pedido_id)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->producto_id}}</td>
                                <td>{{$item->color}}</td>
                                <td>{{$item->talla}}</td>
                                <td>{{$item->cantidad}}</td>
                                <td>{{$item->total}}</td>
                            </tr>
                            @endif
                        @endif
                    @endforeach()
                </tbody>
                

            
            </table>
           
            <div id="mensaje"></div>

            <p>TOTAL:  <span class="price" style="color:black"><input type="submit" value="$$" id="total" class="btn"></span></p>
                
            <div class="row">
                <div class="col-6">
                    <form name=eliminar action="{{ route('detalle.eliminar')}}" method="GET">
                        <input id="did" name="did" type="hidden" required></input>
                        <div class="container">
                        <input type="hidden" id="elcat"  value="Eliminar producto" class="btn btn-secondary">
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <form name=eliminar action="{{ route('pedido')}}" method="GET">
                        <input id="idcliente" name="idcliente" type="hidden" value="{{Auth::user()->role_id}}" type="hidden"></input>
                        <input id="id_empresaria" name="id_empresaria" type="hidden"  value="1"></input>
                        <input id="totalPedido" name="totalPedido" type="hidden"></input>
                        <input id="fecha" name="fecha" value="7/8/2020" type="hidden"></input>
                        <div class="container">
                        <input type="submit" id="enviarTotal"  value="Enviar pedido" class="btn btn-secondary" type="hidden">
                        </div>
                    </form>
                </div>
            </div>



        </div>

        <div class="col-25">
            <div class="container">
                <h4>Pedidos anteriores
                    <span class="price" style="color:black">
                        <i class="fa fa-shopping-cart"></i>
                    </span>
                </h4>

                <table id='tabpedido' class='table table-hover'>
                    <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>CLIENTE</th>
                            <th>EMPRESARIA</th>
                            <th>FECHA</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedido as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->cliente_id}}</td>
                                <td>{{$item->empresaria_id}}</td>
                                <td>{{$item->fecha}}</td>
                                <td>{{$item->total}}</td>
                            </tr>
                            
                        @endforeach()
                    </tbody>
                
                </table>
                <input type="submit" onclick="document.getElementById('id03').style.display='block'" value="Ver Pedido"
                    class="btn">
            </div>


            <!--    Registro -->
            <!--Registro con redes sociales-->
            <div id="id00" class="modal">
                <form class="modal-content animate" action="/bootstrap/realizarPedido.html" method="post">

                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id00').style.display='none'" class="close"
                            title="Close Modal">&times;</span>
                    </div>
                    <div class="container">
                        </p>
                        </i>
                        <font color="#C2A853" , size="3">
                            <h2>
                                <p align="center">REGISTRO CLIENTE</p>
                            </h2>
                        </font>
                        <i>
                            <p>
                            <form action="/action_page.php">
                                <div class="row">
                                    <h2 style="text-align:center"></h2>
                                    <div class="vl">
                                        <span class="vl-innertext"></span>
                                    </div>

                                    <div class="col">
                                        <a href="#" class="fb btn">
                                            <i class="fa fa-facebook fa-fw"></i> Registrarse con Facebook
                                        </a>
                                        <a href="#" class="google btn"><i class="fa fa-google fa-fw">
                                            </i> Registrarse con Google+
                                        </a>
                                    </div>

                                    <div class="col">
                                        <div class="hide-md-lg">
                                            <p>Or sign in manually:</p>
                                        </div>

                                        <input type="text" name="username" placeholder="Usuario" required>
                                        <input type="password" name="password" placeholder="Contraseña" required>
                                        <input type="submit" value="Iniciar seción">
                                    </div>

                                </div>
                            </form>
                            <div class="bottom-container">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" style="color:white" class="btn"
                                            onclick="document.getElementById('id01').style.display='block'"
                                            style="width:auto;">
                                            Registrarse</a>
                                    </div>
                                    <div class="col">
                                        <a href="#" style="color:white" class="btn">Olvido la contraseña?</a>
                                    </div>
                                </div>
                            </div>
                    </div>



                </form>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById('id00');

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>


            <!--Registrarse   Cliente-->

            <div id="id01" class="modal">

                <form class="modal-content animate" action="/bootstrap/realizarPedido.html" method="post">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close"
                            title="Close Modal">&times;</span>

                    </div>

                    <div class="container">
                        <label for="uname"><b>Nombre Completo</b></label>
                        <input type="text" name="uname" required>

                        <label for="psw"><b>Usuario</b></label>
                        <input type="text" name="uname" required>
                        <label for="psw"><b>Correo</b></label>
                        <input type="text" name="uname" required>
                        <label for="psw"><b>Telefono</b></label>
                        <input type="text" name="uname" required>
                        <button type="submit" class="btn btn-outline-secondary">Modificar usuario</button>

                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn">Cancelar</button>
                        <!--Perdida de contrasena-->
                        <!--  <span class="psw">Forgot <a href="#">password?</a></span>   -->
                    </div>
                </form>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById('id01');

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
            
            @if(session('idpedido'))

                        <input id="idpedido" name="idpedido" value="{{session('idpedido')}}" type="hidden" required></input>
            @endif
                        
@endsection
            