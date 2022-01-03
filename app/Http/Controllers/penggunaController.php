<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use App\Models\mapel;
use Session;

class penggunaController extends Controller
{
    public function login()
    {
        return view("contents.login");
    }
    public function loginQuery(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $boolEmail = pengguna::where('email', $email)->exists();
        $boolPassword = pengguna::where('password', $password)->exists();
        $status = $boolEmail && $boolPassword;
        if ($status) {
            session(['email' => $email]);
            session(['is_login' => "True"]);
            return redirect('/home');
        } else {
            return redirect('/login');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

    public function home()
    {
        if (session()->exists('is_login')) {
            $email = session('email');
            $data_user = pengguna::where('email', $email)->get();
            $role = $data_user[0]->role;
            if ($role == "admin") {
                return view("contents.admin_page", ['user' => $data_user[0]]);
            } elseif ($role == "siswa") {
                $email_name = explode("@", $email);
                return view("contents.home", ['email' => $email_name[0]]);
            }
        } else {
            return redirect('/login');
        }
    }
    public function createMapel()
    {
        $guru = pengguna::where('role', "guru")->get();
        return view("contents.insertMapel", ['guru' => $guru]);
    }
    public function uploadMapel( Request $request){
        $nama_mapel = $request->nama_mapel;
        $nama_guru = $request->nama_guru;
        $deskripsi = $request->deskripsi;
        $guru = pengguna::where('email', $nama_guru)->get();
        $id_guru = $guru[0]->id;
        $mapel = new mapel();
        $mapel->id_guru = $id_guru;
        $mapel->nama = $nama_mapel;
        $mapel->deskripsi = $deskripsi;
        $mapel->save();
        return redirect('/home');
    }
}
