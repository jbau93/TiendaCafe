@extends('admin.layoutAdmin')

@section('title', 'Productos')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/products')}}"><i class="fas fa-mug-hot"></i>Productos</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-mug-hot"></i>Productos</h1>
        </div>

        <div class="inside">
            <div class="buttons">
                <a href="{{ url('/admin/product/add') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i>Adicionar</a>
            </div>
            <table class="table">
            </table>
        </div>
    </div>
</div>
@endsection