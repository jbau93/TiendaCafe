<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function(){

    Route::get('/', 'Admin\AdminController@getDashboard');

    Route::get('/users', 'Admin\UserController@getUsers');
    //Route::get('/users/{id}/edit', 'Admin\UserController@getUsersEdit')->name('user_edit');
});

    
