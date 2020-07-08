<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE-edge">-->
        <title>@yield('title') Admin</title>
        
        <meta name="csrf-token" content="{{ csrf_token()}}">
        <meta name="routeName" content="{{Route:: currentRouteName()}}">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="{{url('/static/css/stylusAdmin.css?v='.time()) }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/a0d9a3a788.js" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
            crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    </head>
    <body>
        <div class="d-flex toggled" id="wrapper">
            <div class="col1">@include('admin.sidebar')</div>
            <div class="col2">
                <div id="page-content-wrapper">
                    <!--botones-->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                      <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </nav>
                    <!--contenido principal-->
                    <div class="container-fluid">
                        @section('content')
                        @show
                    </div>
                </div>
            </div>
        </div>
        <!--validacion-->
        @if(Session::has('message'))
            <div class="container">
                <div class="margtop16 alert alert-{{ Session::get('typealert') }}" style="display:none;">
                    {{ Session::get('message') }}
                    <!--lista de errores-->
                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <!--efectos-->
                    <script>
                        $('.alert').slideDown();
                        setTimeout(function(){ $('.alert').slideUp();}, 3000);
                    </script>
                </div>
            </div>
        @endif
        <!--accion boton-->
        <script>
            $("#menu-toggle").click(function(e) {
              e.preventDefault();
              $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>
</html>