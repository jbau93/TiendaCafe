<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Login\LoginController;
use App\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $login = new LoginController;
        $this->middleware('guest')->except(['$login->getLogout()']);
    }

    public function getRegister()
    {

        return view('connect.register');
    }

    public function postRegister(Request $request)
    {

        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirpassword' => 'required|min:8|same:password'
        ];

        $messages = [
            'name.required' => 'Debes ingresar tu nombre',
            'lastname.required' => 'Debes ingresar tu apeliido',
            'email.required' => 'Debes ingresar tu email',
            'email.email' => 'El formato del email es inválido',
            'email.unique' => 'Ya existe un usuario con este email',
            'password' => 'required|min:8',
            'confirpassword' => 'required|same:password',
            'password.required' => 'Debes ingresar la contraseña',
            'password.min' => 'La contraseña debe tener mínimo 8 carácteres',
            'confirpassword.required' => 'Debes confirmar la contraseña',
            'confirpassword.min' => 'La confirmación de la contraseña debe tener 8 caracteres',
            'confirpassword.name' => 'Las contraseñas no coinciden'

        ];

        //pasamos todos los valores a validator
        $validator = Validator::make($request->all(), $rules, $messages);

        //si validacion es false , devuelve los errores correspondientes
        if ($validator->fails()) {

            return back()->withErrors($validator)->with(
                'message',
                'Se ha producido un error'
            )->with('typealert', 'danger');
        } else { //si validacion es true, captura los datos

            $user = new User;
            //con la function e() evitamos  inyection JS
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password')); //encriptamos el password

            //si el usuario se almacenó con éxito
            if ($user->save()) {

                //retorna a la vista login y muestra el mensaje
                return redirect('/login')->with(
                    'message',
                    'Te has registrado con éxito'
                )->with('typealert', 'success');
            }
        }
    }
}
