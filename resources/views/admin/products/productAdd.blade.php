@extends('admin.layoutAdmin')

@section('title', 'Agregar productos')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/products') }}"><i class="fas fa-mug-hot"></i>Productos</a>
    <a href="{{ url('/admin/products/add') }}"><i class="fas fa-plus-square"></i> Adicionar productos</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-plus-square"></i>Productos</h1>
        </div>

        <div class="inside">
            {!! Form::open(['url' => '/admin/products/add']) !!}
            <div class="row">
                <!--campo nombre-->
                <div class="col-md-6">
                    <label for="name">Nombre del producto</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-add">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <!--campo categoria-->
                <div class="col-md-3">
                    <label for="name">Categoria:</label>
                </div>
                <!--campo imagen-->
                <div class="col-md-3">
                    <label for="name">Imagen:</label>
                    <div class="custom-file">
                        {!! Form::file('img', ['class' => 'custom-file-input', 'id'=> 'customFile']) !!}
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
            <!--campo precio-->
            <div class="row m-top-16">
                <div class="col-md-3">
                    <label for="price">Precio:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-add">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::number('price', null, ['class' => 'form-control' , 'min' => '0.00', 'step' => 'any']) !!}
                    </div>
                </div>
                <!--campo descuento-->
                <div class="col-md-3">
                    <label for="price">Descuento:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-add">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::select('discount', ['0' => 'No', '1' => 'Si'], 0, ['class' => 'custom-select']) !!}
                    </div>
                </div>
            </div>
            <!--campo descripcion-->
            <div class="row m-top-16">
                <div class="col-md-12">
                    <label for="content">Descripcion</label>
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection