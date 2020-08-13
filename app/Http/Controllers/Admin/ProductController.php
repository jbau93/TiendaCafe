<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\Category;
use App\Http\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminMiddleware');
        $this->middleware('user.status');
    }

    public function getHome()
    {

        return view('admin.products.productHome');
    }

    public function getProductAdd()
    {
        $categories = Category::where('module', '0')->pluck('name', 'id');
        $data = ['categories' => $categories];

        return view('admin.products.productAdd', $data);
    }

    public function postProductAdd(Request $request)
    {

        $rules = [
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',
            'content' => 'required'
        ];

        $messages = [
            'name.required' => 'El nombre del producto es requerido',
            'img.required' => 'Seleccione una imagen para el producto',
            'img.image' => 'El archivo no es valido',
            'price.required' => 'Ingrese el precio del producto',
            'content.required' => 'Ingrese la descripcion del producto'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            return back()->withErrors($validator)->with(
                'message',
                'Se ha producido un error'
            )->with('typealert', 'danger')->withInput();
        } else {

            $product = new Product;
            $product->status = '0';
            $product->name = e($request->input('name'));
            $product->slug = Str::slug($request->input('name'));
            $product->category_id = $request->input('category_id');
            $product->image = "image";
            $product->price = $request->input('price');
            $product->in_discount = $request->input('in_discount');
            $product->discount = $request->input('discount');
            $product->content = e($request->input('content'));


            if ($product->save()) {

                return redirect('/admin/products')->with('message', 'Guardado con éxito.')->with('typealert', 'success');
            }
        }
    }
}
