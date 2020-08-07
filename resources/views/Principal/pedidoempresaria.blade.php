@extends('layouts.app')

@section('content')

    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

    <div class="container">
        <form action="/action_page.php">
  
            <div class="col-25">
                <div class="container">
                    <h3>Pedidos</h3>
                    <label for="email"><i class="fa fa-envelope"></i> Código pedido </label>
                    <div class="row">
                        <div class="col-8">
                            <input type="text" id="email" name="email">
                        </div>
                        <div class="col-4">
                            <input type="submit" value="Buscar" class="btn">
                        </div>
                    </div>
                </div>
            </div>
        </form>
      
    </div>
  
    <div class="col-25">
      <div class="container">
        <h4>Pedido
          <span class="price" style="color:black">
            <i class="fa fa-shopping-cart"></i>
          </span>
        </h4>
        
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Cliente</th>
                <th scope="col">Catálogo</th>
                <th scope="col">Producto</th>
                <th scope="col">Talla</th>
                <th scope="col">Color</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td scope="col">Rosa Ochoa</td>
                <td scope="col">MIANGEL</td>
                <td scope="col">SHS234</td>
                <td scope="col">M</td>
                <td scope="col">Rojo</td>
                <td scope="col">2</td>
                <td scope="col">23</td>
                <td class="no-pad-top no-pad-bot align-middle">
                    <div class="margin-l-15 checkbox checkboxStyle-table checkColorGreenLight">
                    <input type="checkbox" class="tableid" name="tableid" id="tableid" class="click">
                    <label class="s18 text-normal"></label>
                    </div>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td scope="col">Rosa Ochoa</td>
                <td scope="col">CANNELY</td>
                <td scope="col">CAS234</td>
                <td scope="col">M</td>
                <td scope="col">Rojo</td>
                <td scope="col">2</td>
                <td scope="col">23</td>
                <td class="no-pad-top no-pad-bot align-middle">
                    <div class="margin-l-15 checkbox checkboxStyle-table checkColorGreenLight">
                    <input type="checkbox" class="tableid" name="tableid" id="tableid" class="click">
                    <label class="s18 text-normal"></label>
                    </div>
                </td>
              </tr>
            </tbody>
            </table> 

        <div id="mensaje"></div>
        
        <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
        <p>Ganancias</p> 
        <div class="row">
            <div class="col-4">
                
                <input type="text" id="email" name="email">
        
            </div>
            <div class="col-4">
                <input type="submit" value="Calcular Total" class="btn">
            </div>
            <div class="col-4">
                <input type="submit" value="Finalizar pedido" class="btn">
            </div>
        </div>
        
        <div id="mensaje"></div>
          <h4>Pedido
            <span class="price" style="color:black">
              <i class="fa fa-shopping-cart"></i>
            </span>
          </h4>
          <!--Agregar un campo para verificar la entrega del producto-->
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Código</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Total</th>
                  <th scope="col">Total Ganancias</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td scope="col">Rosa Ochoa</td>
                  <td scope="col">20</td>
                  <td scope="col">3</td>
                  <td scope="col">Finalizado</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td scope="col">Juana Lopéz</td>
                  <td scope="col">70</td>
                  <td scope="col">15</td>
                  <td scope="col">Finalizado</td>
                </tr>
              </tbody>
              </table>
            <p>Total Ganancias<span class="price" style="color:black"><b>$100</b></span></p> 
        
          
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
                                onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
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
                <label for="psw"><b>Nombre</b></label>
                <input type="text" name="uname" required>
                <label for="psw"><b>Correo</b></label>
                <input type="text" name="uname" required>
                <label for="psw"><b>Telefono</b></label>
                <input type="text" name="uname" required>
                <button type="submit" class="btn btn-outline-secondary">Registrarse</button>
                
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

    <!--Registrarse   Empresario-->

@endsection