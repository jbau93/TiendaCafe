@extends('admin.layoutAdmin')

@section('title', 'Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/users') }}"><i class="fas fa-user-friends"></i> Usuarios</a>
</li>
@endsection
    
@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-user-friends"></i> Usuarios</h1>
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
                            <div class="options">
                                <a href="{{ url('/admin/user/'.$user->id.'/edit') }}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ url('/admin/user/'.$user->id.'/delete') }}">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
    
