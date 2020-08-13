
<!--heredamos la plantilla layoutLogin-->
@extends('connect.layoutLogin')

@section('title','Recuperar contraseña')
<!--reemplazando el contenido de esta seccion-->    
@section('content')
    <div class="box box_login shadow">
        <div class="inside">
        {!! Form::open(['url' => '/recover'])!!}
        <!--input email-->
        <label form="email">E-mail:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
            </div>
            {!! Form::email('email', null, ['class' => 'form-control', 'required'])!!}
        </div>
        {!! Form::submit('Recuperar contraseña', ['class' => 'btn btn-success margtop16'])!!}
        {!! Form::close()!!}
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
        </div>
        <div class="footer margtop16">
            <a href="{{url('/register')}}">Deseas registrarte?</a>
            <a href="{{url('/login')}}">Ingresar a mi cuenta</a>
        </div>
    </div>
@endsection
