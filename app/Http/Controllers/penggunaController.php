<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use Session;

class penggunaController extends Controller
{
    public function login()
    {
        return view("contents.login");
    }
    public function loginQuery(Request $request){
        $email = $request ->email;
        $password = $request ->password;
        $boolEmail = pengguna::where('email', $email )->exists();
        $boolPassword = pengguna::where('password', $password )->exists();
        $status = $boolEmail && $boolPassword;
        if ($status){
            session(['email' => $email]);
            session(['is_login' => "True"]);
            return redirect('/home');
        }
        else{
            return redirect('/login');
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/login');
    }

    public function home(){
        if(session()->exists('is_login')){
            $email = session('email');
            $email_name = explode("@", $email);
            return view("contents.home", ['email' => $email_name[0]]);
        }
        else{
            return redirect('/login');
        }
    }
}
