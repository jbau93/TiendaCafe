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
            
                    <div class="inside">
                        <div class="profile">
                            @if(is_null($user->avatar))
                            <img src="{{ url('/static/images/users.jfif') }}">
                            @endif
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
    