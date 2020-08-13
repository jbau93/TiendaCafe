<?php

namespace App\Http\Controllers\Recover;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Login\LoginController;
use App\Mail\UserSendNewPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ResetController extends Controller
{
    public function __construct()
    {
        $login = new LoginController;
        $this->middleware('guest')->except(['$login->getLogout()']);
        
    }

    public function getReset(Request $request){
        
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
