@extends('email.layoutRecover')

@section('content')
    <p>Hola: {{ $name }}</p>
    <p>Esta es tu nueva contraseña</p>
    <p><h2>{{ $password }}</h2></p>
    <p>Para continuar has click en el siguiente botón e ingresa el código:</p>
    <p><a href="{{ url('/login') }}" class="btn btn-primary">Recuperar contraseña</a></p>
    <p>Sí el anterior botón no funciona, copia y pega el siguiente link en tu navegador </p>
    <p><a href="{{ url('/login') }}" class="btn btn-primary">Recuperar contraseña</a></p>
@stop