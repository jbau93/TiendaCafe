<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminMiddleware');
        
    }

    public function getHome(){

        return view('admin.products.productHome');
    }

    public function getProductAdd(){

        return view('admin.products.productAdd');
    }

    
}
