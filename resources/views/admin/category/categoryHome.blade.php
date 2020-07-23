@extends('admin.layoutAdmin');

@section('title', 'Categorias')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/categories') }}"><i class="fas fa-tags"></i> Categorias</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-plus-square"></i>Agregar categoria</h1>
                </div>
        
                <div class="inside">
                    {!! Form::open(['url' => '/admin/category/add']) !!}
                    <!--campo nombre-->
                    <label for="name">Nombre</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-add">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <!--campo modulo-->
                    <label for="module" class="m-top-16">Modulo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-add">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::select('module', getModulesArray(), 0, ['class' => 'custom-select']) !!}
                    </div>
                    <!--campo icono-->
                    <label for="icon" class="m-top-16">Icono</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-add">
                                <i class="fas fa-folder"></i>
                            </span>
                        </div>
                        {!! Form::text('icono', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success m-top-16'])!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection