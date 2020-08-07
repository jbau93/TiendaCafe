@extends('email.layoutRecover')

@section('content')
    <p>Hola: {{ $name }}</p>
    <p>Aquí puedes reestablecer tu contraseña<p>
    <p>Para continuar has click en el siguiente botón e ingresa el código: <h2>{{ $code }}</h2></p>
    </p>
    <p><a href="{{ url('/reset?email='.$email) }}" class="btn btn-primary">Recuperar contraseña</a></p>
    <p>Sí el anterior botón no funciona, copia y pega el siguiente link en tu navegador </p>
    <p><a href="{{ url('/reset?email='.$email) }}" class="btn btn-primary">Recuperar contraseña</a></p>
@stop