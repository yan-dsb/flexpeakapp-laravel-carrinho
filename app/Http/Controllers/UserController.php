<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
        $usuarios = User::all();

        return view ('usuarios.index', ['usuarios'=> $usuarios]);
    }

    public function show ($id){
        $usuario = User::findOrFail($id);
        return view ('usuarios.show', ['usuario'=> $usuario]);
    }
    public function update(Request $request, $id){
        $usuario = User::findOrFail($id);

    }
    public function delete($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect('usuarios');

    }
}
