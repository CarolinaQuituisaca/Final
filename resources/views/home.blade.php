@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

            </div>

            
        </div>
        <div class="container-fluid"> 
            <div class="row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <h1 class="text-center">VENTA POR CATÁLOGO </h1>.
                </div>
            </div>

        </div>

        <div align="center"><img src="http://catalogomiangel.com/wp-content/uploads/2020/07/INICIO-WEB5.jpg"></div>
            
    </div>
</div>
@endsection
