<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    /*
    *ログイン画面を表示
    *@return view
    */

    public function login(){
        return view('login.login');
    }
}
