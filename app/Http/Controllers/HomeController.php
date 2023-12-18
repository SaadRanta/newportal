<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function login (){
        return view ('auth.login');
    }
    public function registers (){
        return view ('auth.register');
    }

    public function testing (){
        return view ('test');
    }

}
