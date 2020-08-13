
<!--heredamos la plantilla layoutLogin-->
@extends('connect.layoutLogin')

@section('title','Registrarse')
<!--reemplazando el contenido de esta seccion-->    
@section('content')
    <div class="box box_login shadow">
        <div class="inside">
            {!! Form::open(['url' => '/register'])!!}
            <!--input nombres-->
            <label form="name">Nombres:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="far fa-user"></i></div>
                </div>
                {!! Form::text('name', null, ['class' => 'form-control','required'])!!}
            </div>
            <!--input apellidos-->
            <label form="lastname" class="margtop16">Apellidos:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user-friends"></i></div>
                </div>
                {!! Form::text('lastname', null, ['class' => 'form-control','required'])!!}
            </div>
            <!--input email-->
            <label form="email" class="margtop16">E-mail:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
                </div>
                {!! Form::email('email', null, ['class' => 'form-control', 'required'])!!}
            </div>
            <!--input password-->
            <label form="password" class="margtop16">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                </div>
                {!! Form::password('password', ['class' => 'form-control', 'required'])!!}
            </div>
            <!--confirmar password-->
            <label form="confirpassword" class="margtop16">Confirmar contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                </div>
                {!! Form::password('confirpassword', ['class' => 'form-control', 'required'])!!}
            </div>
            {!! Form::submit('Registrarse', ['class' => 'btn btn-success margtop16'])!!}
            {!! Form::close()!!}
        </div>
        <!--si existe una variable message nos muestra los alerts-->
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
        <div class="footer margtop16">
            <a href="{{url('/login')}}">Ya me registré, deseo continuar</a>
        </div>
    </div>
@endsection
