@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



<div class="container">
    @if(session('mensaje'))
            <div class="alert alert-success">
              {{session('mensaje')}}
            </div>
    @endif
      <p><b>
          <h2>Administrador</h2>
        </b></p>
      <p>Administración de los datos de la empresa</p>
      <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link" href="{{ url('/administrador') }}">CATEGORÍAS</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/catalogo') }}">CATÁLOGOS</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/producto') }}">PRODUCTOS</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/cliente') }}">CLIENTE</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane container active" id="menu1">
        @yield('contentadm')
        </div>
      </div>

      
</div>  
    @yield('ventanas')    
@endsection
