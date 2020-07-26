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
            <!--botón filtrar usuarios-->
            <div class="row">
                <div class="col-m2 offset-md-10">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-filter"></i>Filtrar
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('/admin/users/all') }}"><i class="fas fa-users"></i> Todos</a>
                            <a class="dropdown-item" href="{{ url('/admin/users/0') }}"><i class="fas fa-user-clock"></i> No verificados</a>
                            <a class="dropdown-item" href="{{ url('/admin/users/1') }}"><i class="fas fa-user-check"></i> Verificados</a>
                            <a class="dropdown-item" href="{{ url('/admin/users/100') }}"><i class="fas fa-user-lock"></i> Bloqueados</a>
                          </div>
                    </div>
                </div>
            </div>
            
            <table class="table m-top-16">
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
                    <tr>
                    <td colspan="5">{!! $users->render() !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
    
