<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {

    Route::get('/', 'Admin\AdminController@getDashboard');

    //usuarios
    Route::get('/users/{status}', 'Admin\UserController@getUsers');
    Route::get('/user/{id}/edit', 'Admin\UserController@getUsersEdit');
    Route::get('/user/{id}/locked', 'Admin\UserController@getUsersLocked');
    Route::get('/user/{id}/permissions', 'Admin\UserController@getUsersPermissions');

    //productos
    Route::get('/products', 'Admin\ProductController@getHome');
    Route::get('/product/add', 'Admin\ProductController@getProductAdd');
    Route::post('/product/add', 'Admin\ProductController@postProductAdd');

    //categorias
    Route::get('/categories', 'Admin\CategoryController@getHome');
    Route::post('/category/add', 'Admin\CategoryController@postCategoryAdd');
});
