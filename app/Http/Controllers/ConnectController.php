<?php

namespace App\Http\Controllers;

use App\Mail\UserSendRecover;
use App\Mail\UserSendNewPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ConnectController extends Controller
{
    //asignamos los metodos que puede acceder un usuario no registrado(visitante)
    public function __construct()
    {
        $this->middleware('guest')->except(['getLogout']);//a excepcion del método logout
        
    }
    //function que retorna la vista login
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
            'email.required' => 'Debes ingresar tu e-mail',
            'email.email' => 'El formato de su e-mail es inválido',
            'password.required' => 'Debes ingresar la contraseña',
            'password.min' => 'La contraseña debe tener mínimo 8 carácteres'
            
        ];

        //pasamos todos los valores a validator
        $validator = Validator::make($request->all(), $rules, $messages);

        //pasamos todos los valores a validator
        if($validator->fails()):

            return back()->withErrors($validator)->with('message', 
            'Se ha producido un error')->with('typealert' , 'danger');

        else:
            //validamos que el usuario este registrado para iniciar sesión y dejamos la sesion en true
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)):

                //si el usuario está bloqueado, negar el acceso
                if(Auth::user()->status == 100){

                    return redirect('/logout');

                }else{

                    return redirect('/');
                }

                

            else:

                return back()->withErrors($validator)->with('message', 
                'Se ha producido un error')->with('typealert' , 'danger');

            endif;
        endif;

    }

    //function que retorna la vista register
    public function getRegister()
    {

        return view('connect.register');
    }

    //function para las validaciones
    public function postRegister(Request $request)
    {
        //lista de campos a validar
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirpassword' => 'required|min:8|same:password',//confirmando password
        ];

        //mensajes de errores en las validaciones
        $messages = [
            'name.required' => 'Debes ingresar tu nombre',
            'lastname.required' => 'Debes ingresar tu apellido',
            'email.required' => 'Debes ingresar tu e-mail',
            'email.email' => 'El formato de su e-mail es inválido',
            'email.unique' => 'Ya existe un usuario con este e-mail',
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
        if($validator->fails()):

            return back()->withErrors($validator)->with('message', 
            'Se ha producido un error')->with('typealert' , 'danger');

        //si validacion es true, captura los datos
        else:
            $user = new User;
            //con la function e() evitamos  inyection JS
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));//encriptamos el password

            //si el usuario se almacenó con éxito
            if($user->save()):

                //retorna a la vista login y muestra el mensaje
                return redirect('/login')->with('message', 
                'Te has registrado con éxito')->with('typealert' , 'success');
            endif;
        endif;

    }

    //al cerrar sesión el usuario, lo direcciona a la vista home
    public function getLogout()
    {
        $status = Auth::user()->status;
        Auth::logout();

        if($status == 100){

            return redirect('/login')->with('message', 'Lo sentimos, has sido bloqueado')->with('typealert', 'danger');

        }else{

            return redirect('/');
        }

    }

    //funcion que retorna vista para recuperar contraseña
    public function getRecover()
    {
        return view('connect.recover');
    }

    //funcion que valida los datos para recuperar contraseña
    public function postRecover(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];

        $messages = [
            'email.required' => 'Debes ingresar tu e-mail',
            'email.email' => 'El formato de su e-mail es inválido',            
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        //pasamos todos los valores a validator
        if($validator->fails()){

            return back()->withErrors($validator)->with('message', 
            'Se ha producido un error')->with('typealert' , 'danger');
        
        }else{

            $user = User::where('email', $request->input('email'))->count();

            if($user == "1"){

                $user = User::where('email', $request->input('email'))->first();
                $code = rand(100000, 999999); //numero aleatorio
                $data = ['name' => $user->name, 'email' => $user->email, 'code' => $code];
                $userCode = User::find($user->id);
                $userCode->password_Code = $code;

                if($userCode->save()){

                    Mail::to($user->email)->send(new UserSendRecover($data));

                    return redirect('/reset?email='.$user->email)->with('message', 
                    'Ingresa el código que hemos enviado al email')->with('typealert', 'danger');

                }else{

                    return back()->with('message', 'Este email no existe.')->with('typealert', 'danger');
                }

            }
        }
    }

    public function getReset(Request $request)
    {
        $data = ['email' => $request->get('email')];

        return view('connect.reset', $data);
    }

    public function postReset(Request $request)
    {

         //lista de campos a validar
         $rules = [
            
            'email' => 'required|email',
            'code' => 'required'
        ];

        //mensajes de errores en las validaciones
        $messages = [
            'email.required' => 'Debes ingresar tu e-mail',
            'email.email' => 'El formato de su e-mail es inválido',
            'code.required' => 'El código de recuperación es requerido'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        //pasamos todos los valores a validator
        if($validator->fails()){

            return back()->withErrors($validator)->with('message', 
            'Se ha producido un error')->with('typealert' , 'danger');

        }else{

            $user = User::where('email', $request->input('email'))->where('password_code', $request->input('code'))->count();

            if($user == "1"){

                $user = User::where('email', $request->input('email'))->where('password_code', $request->input('code'))->first();
                $newPassword = Str::random(8);
                $user->password = Hash::make($newPassword);
                $user->password_code = null;

                if($user->save()){

                    $data = ['name' => $user->name, 'password' => $newPassword];
                    Mail::to($user->email)->send(new UserSendNewPassword($data));

                    return redirect('/login')->with('message', 
                    'La contraseña ha sido reestablecida con éxito')->with('typealert', 'success');

                }
            }else{

                return back()->with('message', 'El email o el código de recuperación son erróneos.')->with('typealert', 'danger');
            }
        }
    }
}
