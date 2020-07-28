<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminMiddleware');
        $this->middleware('user.status');
    }

    //retorna los usuarios registrados
    public function getUsers($status)
    {
        if($status == 'all'){
            $users = User::orderBy('id', 'Desc')->paginate(10);

        }else{
            
            $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(10);

        }

        $data = ['users' => $users];
        return view('admin.user.user', $data);
    }

    //editar los usuarios
    public function getUsersEdit($id)
    {
        $user = User::findOrFail($id);//si no existe usuario, devuelve error
        $data = ['user' => $user];

        return view('admin.user.userEdit', $data);

    }

    public function getUsersLocked($id)
    {
        $user = User::findOrFail($id);

        if($user->status == "100"){

            $user->status = "1";
            $message = "Usuario activo nuevamente";

        }else{

            $user->status = "100";
            $message = "Usuario bloqueado con éxito";
        }

        if($user->save()){

            return back()->with('message', $message)->with('typealert', 'success');
        }
    }
}
