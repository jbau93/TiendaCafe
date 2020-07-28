<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminMiddleware');
        $this->middleware('user.status');
    }

    public function getHome()
    {

        return view('admin.category.categoryHome');
    }

    public function postCategoryAdd(Request $request)
    {
        $rules = [
            'name' => 'required',
            'icono'  => 'required',
        ];
        $messages = [
            'name.required' => 'Debes ingresar el nombre de la categoria',
            'icono.required' => 'Debes ingresar un icono para la categoria'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
        
            return back()->withErrors($validator)->with('message', 
            'Se ha producido un error')->with('typealert' , 'danger');


        else:
        
        endif;
    }
}
