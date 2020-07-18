<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function(){

    Route::get('/', 'Admin\AdminController@getDashboard');

    Route::get('/users', 'Admin\UserController@getUsers');

    //productos
    Route::get('/products', 'Admin\ProductController@getHome');
    Route::get('/products/add', 'Admin\ProductController@getProductAdd');

    //categorias
    Route::get('/categories', 'Admin\CategoryController@getHome');

    
});

    
