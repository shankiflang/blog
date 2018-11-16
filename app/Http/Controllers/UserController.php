<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index(){

        $users = User::All();
        $categories = Categorie::All();

        return view("layouts/user/user")->with(array(
            "users" => $users,
            "categories" => $categories
        ));

    }

    public function nouveau_user(){

        $categories = Categorie::All();

        return view('layouts.user.nouveau')->with(array('categories' => $categories));

    }

    public function creation_user(Request $request){
        // creation user post

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'perm' => 'required',
            'password' => 'required|max:50'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'perm' => $request['perm'],
            'password' => Hash::make($request['password'])
        ]);

        return redirect('/user');
    }

    public function edition_user($id){

        $categories = Categorie::All();
        $user = User::find($id);

        return view('layouts.user.edition')->with(array('categories' => $categories, 'user' => $user));
    }

    public function edition_valid_user(Request $request, $id){

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'perm' => 'required'
        ]);

        $user_a_editer = User::find($id);
        $user_a_editer->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'perm' => $request['perm']
        ]);

        return redirect('/user/')->withSuccess('Le compte a bien été édité.');

    }

    public function suppression_user($id){

        $user_a_supprimer = User::find($id);
        $user_a_supprimer->delete();

        return redirect('/user')->withSuccess('Le compte a bien été supprimé.');
    }

}
