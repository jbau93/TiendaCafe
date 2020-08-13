<?php

namespace App\Http\Controllers\Recover;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Login\LoginController;
use App\Mail\UserSendRecover;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RecoverController extends Controller
{
    public function __construct()
    {
        $login = new LoginController;
        $this->middleware('guest')->except(['$login->getLogout()']);
    }

    public function getRecover()
    {

        return view('connect.recover');
    }

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
        if ($validator->fails()) {

            return back()->withErrors($validator)->with(
                'message',
                'Se ha producido un error'
            )->with('typealert', 'danger');
        } else {

            $user = User::where('email', $request->input('email'))->count();

            if ($user == "1") {

                $user = User::where('email', $request->input('email'))->first();
                $code = rand(100000, 999999); //numero aleatorio
                $data = ['name' => $user->name, 'email' => $user->email, 'code' => $code];
                $userCode = User::find($user->id);
                $userCode->password_Code = $code;

                if ($userCode->save()) {

                    Mail::to($user->email)->send(new UserSendRecover($data));

                    return redirect('/reset?email=' . $user->email)->with(
                        'message',
                        'Ingresa el código que hemos enviado al email'
                    )->with('typealert', 'danger');
                } else {

                    return back()->with('message', 'Este email no existe.')->with('typealert', 'danger');
                }
            }
        }
    }
}
