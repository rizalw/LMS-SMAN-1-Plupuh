<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use App\Models\mapel;
use App\Models\bab;
use App\Models\kelas;
use App\Models\kelas_mapel;
use App\Models\tugas;

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
                $daftar_tugas = tugas::all();
                $nama = $data_user[0]->Nama;
                return view("contents.home", [ 'nama' => $nama, 'data_siswa' => $data_user, 'daftar_tugas' => $daftar_tugas]);
            } elseif ($role == "guru") {
                $daftar_mapel = mapel::where('id_guru', $data_user[0]->id)->get();
                $daftar_bab = bab::all();
                return view("contents.guru_page", ['user' => $data_user[0], 'mapel' => $daftar_mapel, 'bab' => $daftar_bab]);
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
    public function createBab($id){
        $mapel = mapel::find($id);
        return view("Contents.insertBab", ['mapel' => $mapel]);
    }
    public function uploadBab(Request $request){
        $id_mapel = $request->id_mapel;
        $nama_bab = $request->nama;
        $deskripsi = $request->deskripsi;
        $mapel = new bab();
        $mapel->id_mapel = $id_mapel;
        $mapel->nama = $nama_bab;
        $mapel->deskripsi = $deskripsi;
        $mapel->save();
        return redirect('/home');
    }
    public function createKelas()
    {
        $daftar_kelas = kelas::all();
        return view("contents.createKelas", ['daftar_kelas' => $daftar_kelas]);
    }
    public function uploadKelas(Request $request){
        $nama_kelas = $request->nama;
        $tahun_ajaran = $request->tahun_ajaran;
        $kelas = new kelas();
        $kelas->nama_kelas = $nama_kelas;
        $kelas->tahun_ajaran = $tahun_ajaran;
        $kelas->save();
        return redirect('/createKelas');
    }
    public function assignMapel(){
        $daftar_mapel = mapel::all();
        return view("contents.assignMapel", ['daftar_mapel' => $daftar_mapel]);
    }
    public function assignMapelProcess($id){
        $data_mapel  = mapel::find($id);
        $daftar_kelas = kelas::all();
        return view("contents.assignMapelProcess", ['daftar_kelas' => $daftar_kelas, 'data_mapel' => $data_mapel]);
    }
    public function assignMapelFinal(Request $request){
        $id_kelas = $request->id_kelas;
        $id_mapel = $request->id_mapel;
        $kelas_mapel = new kelas_mapel();
        $kelas_mapel->id_kelas = $id_kelas;
        $kelas_mapel->id_mapel = $id_mapel;
        $kelas_mapel->save();
        return redirect("/assignMapel");
    }
    public function assignSiswa(){
        $daftar_siswa = pengguna::where('role', "siswa")->get();
        return view("contents.assignSiswa", ['daftar_siswa' => $daftar_siswa]);
    }
    public function assignSiswaProcess($id)
    {
        $data_siswa = pengguna::find($id);
        $daftar_kelas = kelas::all();
        return view('contents.assignSiswaProcess', ['daftar_kelas' => $daftar_kelas, 'data_siswa' => $data_siswa]);
    }
    public function assignSiswaFinal(Request $request){
        $id_siswa = $request->siswa;
        $id_kelas = $request->id_kelas;
        $siswa = pengguna::find($id_siswa);
        $siswa->id_kelas = $id_kelas;
        $siswa->save();
        return redirect('/home');
    }
    public function createTugas($id_bab){
        $bab = bab::find($id_bab);
        return view("contents.createTugas", ['bab' => $bab]);
    }
    public function createTugasFinal(Request $request){
        $id_bab = $request->id_bab;
        $nama_tugas = $request->nama;
        $deskripsi_tugas = $request->deskripsi;
        $tenggat_tanggal = $request->tanggal;
        $tenggat_waktu = $request->waktu;
        $deadline = date('Y-m-d H:i:s', strtotime("$tenggat_tanggal $tenggat_waktu"));
        $tugas = new tugas();
        $tugas->id_bab = $id_bab;
        $tugas->nama = $nama_tugas;
        $tugas->deskripsi = $deskripsi_tugas;
        $tugas->deadline = $deadline;
        $tugas->save();
        return redirect('/home');
    }
}
