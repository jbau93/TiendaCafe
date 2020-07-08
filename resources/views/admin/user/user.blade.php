@extends('admin.layoutAdmin')

@section('title', 'Usuarios')
    
@section('content')
    <div class="panel shadow">
        <div class="header">
            <h1 class="title"><i class="fas fa-user-friends"></i></i> Usuarios</h1>
        </div>
    </div>
    <div class="inside">
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>E-mail</td>
                    <td>Estado</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href=""></td>
                    <td></td>
                    <td>
                        <a href="{{ url('/admin/user/'.$user->id.'/edit') }}">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="{{ url('/admin/user/'.$user->id.'/delete') }}">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
@endsection