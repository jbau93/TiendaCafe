<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function(){

    Route::get('/', 'Admin\AdminController@getDashboard');

    //usuarios
    Route::get('/users', 'Admin\UserController@getUsers');
    Route::get('/user/{id}/edit', 'Admin\UserController@getUsersEdit');

    //productos
    Route::get('/products', 'Admin\ProductController@getHome');
    Route::get('/products/add', 'Admin\ProductController@getProductAdd');

    //categorias
    Route::get('/categories', 'Admin\CategoryController@getHome');
    Route::post('/category/add', 'Admin\CategoryController@postCategoryAdd');

    
});

    
