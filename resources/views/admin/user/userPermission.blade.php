@extends('admin.layoutAdmin')

@section('title', 'Editar Usuario')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/users/all') }}"><i class="fas fa-user-friends"></i> Usuarios</a>
</li>
<li class="breadcrumb-item">
<a href="{{ url('/admin/users') }}"><i class="fas fa-user-friends"></i> Permisos de {{ $user->name}}</a>
</li>
@endsection
    
@section('content')
<div class="container-fluid">
    <div class="page-user">
        <div class="row">
            @include('admin.user.permissions.moduleDashboard')
            @include('admin.user.permissions.moduleUsers')
            @include('admin.user.permissions.moduleProducts')
            @include('admin.user.permissions.moduleCategories')
        </div>
    </div>
</div>
@endsection
    