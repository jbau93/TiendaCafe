<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function(){

    Route::get('/', 'Admin\AdminController@getDashboard');

    //usuarios
    Route::get('/users/{status}', 'Admin\UserController@getUsers');
    Route::get('/user/{id}/edit', 'Admin\UserController@getUsersEdit');
    Route::get('/user/{id}/locked', 'Admin\UserController@getUsersLocked');
    Route::get('/user/{id}/permissions', 'Admin\UserController@getUsersPermissions');

    //productos
    Route::get('/products', 'Admin\ProductController@getHome');
    Route::get('/products/add', 'Admin\ProductController@getProductAdd');

    //categorias
    Route::get('/categories/{module}', 'Admin\CategoryController@getHome');
    Route::post('/category/add/1', 'Admin\CategoryController@postCategoryAdd');

    
});

    
