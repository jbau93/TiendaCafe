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
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 

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
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="col1">@include('admin.sidebar')</div>
            <div class="col2">
                <nav class="navbar navbar-expand-lg shadow">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav item">
                                <a href="{{ url('/admin') }}" class="nav-link"><i class="fas fa-home"></i>Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </nav> 
                <div class="page">
                    <div class="container-fluid">
                        <nav arial-label="breadcrumb shadow">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i>Dashboard</a>
                                </li>
                                @section('breadcrumb')
                                    
                                @show
                            </ol>
                        </nav>
                    </div>

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

                    @section('content')
                    @show
                </div>
            </div>
        </div>
    </body>
</html>