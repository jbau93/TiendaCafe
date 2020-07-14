<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//verifica que el usuario este conectados
        $this->middleware('adminMiddleware');
    }

    //retorna la vista dashboard
    public function getDashboard(){

        return view('admin.dashboard');
    }
}
