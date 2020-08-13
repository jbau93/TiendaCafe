<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //metodos a los que puede acceder un usuario no registrado(visitante)
    public function __construc()
    {
        $this->middleware('guest')->except(['getLogout']);//a excepcion de getLogout()
    }

    public function getLogin()
    {
        return view('connect.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|min:8'

        ];

        $messages = [
            'email.required' => 'Debes ingresar tu email',
            'email.email' => 'El formato de tu email es inválido',
            'password.required' => 'Debes ingresar tu contraseña',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        //pasamos todos los valores a validar
        if ($validator->fails()) {

            return back()->withErrors($validator)->with(
                'message',
                'Se ha producido un error'
            )->with('typealert', 'danger');
        } else {

            //validamos que el usuario esté registrado para iniciar sesión y dejamos la sesión en true
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)) {

                //si el usuairo está bloqueado, negar el acceso
                if (Auth::user()->status == 100) {

                    return redirect('/logout');
                } else {

                    return redirect('/admin');
                }
            } else {

                return back()->withErrors($validator)->with(
                    'message',
                    'Se ha producido un error'
                )->with('typealert', 'danger');
            }
        }
    }

    //al cerrar sesión el usuario, lo direcciona a la vista home
    public function getLogout(){

        $status = Auth::user()->status;
        Auth::logout();

        if($status == 100){

            return redirect('/login')->with('message', 'Lo sentimos, has sido bloqueado')->with('typealert', 'danger');
        }else{

            return redirect('/');
        }
    }
}
