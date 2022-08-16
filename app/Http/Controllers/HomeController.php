<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  //la page/vue home.lade.php
    public function home() {
    return view('home.home');
  }
//la page/vue about.blade.php
public function about(){
    return view('home.about');
}
//la page/vue dashbord.blade.php
public function dashboard()
{
    return view('home.dashboard');
}

public function listeUtilisateurs()
{
    $user = User::paginate(5);

    return view('lirewire.utilisateurs.index',['users'=>$user]);

}

}
