<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminMiddleware');
    }

    //retorna los usuarios registrados
    public function getUsers()
    {
        $users = User::orderBy('id', 'Desc')->get();
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
}
