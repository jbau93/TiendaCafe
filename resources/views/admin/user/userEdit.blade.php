@extends('admin.layoutAdmin')

@section('title', 'Editar Usuario')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/users') }}"><i class="fas fa-user-friends"></i> Usuarios</a>
</li>
@endsection
    
@section('content')
<div class="container-fluid">
    <div class="page-user">
        <div class="row">
            <!--informacion-->
            <div class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-user"></i> Información</h1>
                    </div>
                    <!--foto de perfil-->
                    <div class="inside">
                        <div class="profile">
                            @if(is_null($user->avatar))
                                <img src="{{ url('/static/images/users.jfif') }}" class="photo-user">
                            @else
                                <img src="{{ url('/uploads/user/'.$user->id.'/'.$user->photo ) }}" class="photo-user">
                            @endif
                            <div class="info">
                                <span class="title"><i class="far fa-id-card"></i> Nombre:</span>
                                <span class="text">{{ $user->name }} {{ $user->lastname}}</span>
                                <span class="title"><i class="fas fa-envelope-square"></i> Correo:</span>
                                <span class="text">{{ $user->email }}</span>
                                <span class="title"><i class="far fa-calendar-alt"></i> Fecha de registro:</span>
                                <span class="text">{{ $user->created_at }}</span>
                                <span class="title"><i class="fas fa-user-tag"></i> Rol de usuario:</span>
                                <span class="text">{{ getRoleUser($user->role) }}</span>
                                <span class="title"><i class="far fa-star"></i> Estado:</span>
                                <span class="text">{{ getStatusUser($user->status) }}</span>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--editar informacion-->
            <div class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-user-edit"></i> Editar información</h1>
                    </div>
            
                    <div class="inside">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    