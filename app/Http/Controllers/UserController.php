<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index_login()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        return redirect(route('index_admin'));
    }


    public function index()
    {
        $user = User::orderBy('NOM')->get();
        return view('admin.index', compact('user'));
    }



    public function readById($id)
    {
        $user = User::findOrfail($id);
        return view('admin.update_user', compact('user'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'mail' => 'required|unique:users',
            'mdp' => 'required'
        ]);

        User::create([
            'NOM' => $request->nom,
            'PRENOM' => $request->prenom,
            'MAIL' => $request->mail,
            'MDP' => md5($request->mdp)
        ]);

        return redirect(route('index_admin'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'mail' => 'required',
            'mdp' => 'required'
        ]);

        User::where('ID', $request->id)->update([
            'NOM' => $request->nom,
            'PRENOM' => $request->prenom,
            'MAIL' => $request->mail,
            'MDP' => md5($request->mdp)
        ]);
        return redirect(route('index_admin'));
    }


    public function delete($id)
    {
        User::where('ID', $id)->delete();
        return redirect(route('index_admin'));
    }
}

