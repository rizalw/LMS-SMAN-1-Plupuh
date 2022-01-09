<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use App\Models\mapel;
use App\Models\bab;
use App\Models\kelas;
use App\Models\kelas_mapel;
use App\Models\materi;
use App\Models\siswa_tugas;
use App\Models\tugas;
use Carbon\Carbon;


class penggunaController extends Controller
{
    public function login()
    {
        return view("contents.welcome");
    }
    public function loginQuery(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $status = pengguna::where('email', $email)->exists();
        if ($status) {
            $pengguna = pengguna::where('email', $email)->get();
            if ($pengguna[0]->password == $password) {
                session(['id' => $pengguna[0]->id]);
                session(['nama' => $pengguna[0]->Nama]);
                session(['email' => $email]);
                session(['is_login' => "True"]);
                return redirect('/home');
            } else {
                return redirect('/login');
            }
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
                $data_pengguna = pengguna::all();
                $data_kelas = kelas::all();
                $data_mapel = mapel::all();
                return view("contents.admin_page", ['user' => $data_user[0], 'pengguna' => $data_pengguna, 'kelas' => $data_kelas, 'mapel' => $data_mapel]);
            } elseif ($role == "siswa") {
                $daftar_tugas = tugas::all();
                $nama = $data_user[0]->Nama;
                return view("contents.home", ['nama' => $nama, 'data_siswa' => $data_user[0], 'daftar_tugas' => $daftar_tugas]);
            } elseif ($role == "guru") {
                $daftar_mapel = mapel::where('id_guru', $data_user[0]->id)->get();
                $daftar_bab = bab::all();
                $daftar_tugas = tugas::all();
                $daftar_materi = materi::all();
                return view("contents.guru_page", ['user' => $data_user[0], 'mapel' => $daftar_mapel, 'bab' => $daftar_bab, 'daftar_tugas' => $daftar_tugas, 'daftar_materi' => $daftar_materi]);
            }
        } else {
            return redirect('/login');
        }
    }
    public function profile()
    {
        if (session()->exists('is_login')) {
            $id_siswa = session('id');
            $siswa = pengguna::find($id_siswa);
            return view('contents.profileSiswa', ['siswa' => $siswa]);
        } else {
            return redirect("/login");
        }
    }
    public function lihatMapel($id)
    {
        if (session()->exists('is_login')) {
            $mapel = mapel::find($id);
            $daftar_materi = materi::all();
            $daftar_tugas = tugas::all();
            $daftar_bab = bab::where('id_mapel', $id)->get();
            return view('contents.matpelPage', ['mapel' => $mapel, 'daftar_bab' => $daftar_bab, 'daftar_materi' => $daftar_materi, 'daftar_tugas' => $daftar_tugas]);
        } else {
            return redirect("/login");
        }
    }
    public function lihatMapelGuru($id)
    {
        if (session()->exists('is_login')) {
            $mapel = mapel::find($id);
            $daftar_materi = materi::all();
            $daftar_tugas = tugas::all();
            $daftar_bab = bab::where('id_mapel', $id)->get();
            return view('contents.matpelPageGuru', ['mapel' => $mapel, 'daftar_bab' => $daftar_bab, 'daftar_materi' => $daftar_materi, 'daftar_tugas' => $daftar_tugas]);
        } else {
            return redirect("/login");
        }
    }
    public function createMapel()
    {
        if (session()->exists('is_login')) {
            $guru = pengguna::where('role', "guru")->get();
            return view("contents.insertMapel", ['guru' => $guru]);
        } else {
            return redirect("/login");
        }
    }
    public function uploadMapel(Request $request)
    {
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
    public function updateMapel($id)
    {
        if (session()->exists('is_login')) {
            $mapel = mapel::find($id);
            return view('contents.updateMapel', ['mapel' => $mapel]);
        } else {
            return redirect("/login");
        }
    }
    public function updateMapelFinal(Request $request)
    {
        $nama_mapel = $request->nama_mapel;
        $deskripsi = $request->deskripsi;
        $mapel =  mapel::find($request->id);
        $mapel->nama = $nama_mapel;
        $mapel->deskripsi = $deskripsi;
        $mapel->save();
        return redirect('/home');
    }
    public function deleteMapel($id)
    {
        if (session()->exists('is_login')) {
            $mapel = mapel::find($id);
            $mapel->delete();
            return redirect('/home');
        } else {
            return redirect("/login");
        }
    }

    public function createBab($id)
    {
        if (session()->exists('is_login')) {
            $mapel = mapel::find($id);
            return view("Contents.insertBab", ['mapel' => $mapel]);
        } else {
            return redirect("/login");
        }
    }
    public function updateBab($id)
    {
        $bab = bab::find($id);
        return view("contents.updateBab", ['bab' => $bab]);
    }
    public function updateBabFinal(Request $request)
    {
        $bab = bab::find($request->id_bab);
        $bab->nama = $request->nama;
        $bab->deskripsi = $request->deskripsi;
        $bab->save();
        return redirect('/home');
    }
    public function deleteBab($id)
    {
        $bab = bab::find($id);
        $bab->delete();
        return redirect('/home');
    }
    public function uploadBab(Request $request)
    {
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
        if (session()->exists('is_login')) {
            $daftar_kelas = kelas::all();
            return view("contents.createKelas", ['daftar_kelas' => $daftar_kelas]);
        } else {
            return redirect("/login");
        }
    }
    public function uploadKelas(Request $request)
    {
        $nama_kelas = $request->nama;
        $tahun_ajaran = $request->tahun_ajaran;
        $kelas = new kelas();
        $kelas->nama_kelas = $nama_kelas;
        $kelas->tahun_ajaran = $tahun_ajaran;
        $kelas->save();
        return redirect('/home');
    }
    public function updateKelas($id)
    {
        $kelas = kelas::find($id);
        return view('contents.updateKelas', ['kelas' => $kelas]);
        if (session()->exists('is_login')) {
        } else {
            return redirect("/login");
        }
    }
    public function updateKelasFinal(Request $request)
    {
        $nama_kelas = $request->nama;
        $tahun_ajaran = $request->tahun_ajaran;
        $kelas = kelas::find($request->id);
        $kelas->nama_kelas = $nama_kelas;
        $kelas->tahun_ajaran = $tahun_ajaran;
        $kelas->save();
        return redirect('/home');
    }
    public function deleteKelas($id)
    {
        if (session()->exists('is_login')) {
            $kelas = kelas::find($id);
            $kelas->delete();
            return redirect('/home');
        } else {
            return redirect("/login");
        }
    }
    public function assignMapel()
    {
        if (session()->exists('is_login')) {
            $daftar_mapel = mapel::all();
            return view("contents.assignMapel", ['daftar_mapel' => $daftar_mapel]);
        } else {
            return redirect("/login");
        }
    }
    public function assignMapelFinal(Request $request)
    {
        $id_kelas = $request->id_kelas;
        $id_mapel = $request->id_mapel;
        $kelas_mapel = new kelas_mapel();
        $kelas_mapel->id_kelas = $id_kelas;
        $kelas_mapel->id_mapel = $id_mapel;
        $kelas_mapel->save();
        return redirect("/home");
    }
    public function assignSiswaFinal(Request $request)
    {
        $id_siswa = $request->id_siswa;
        $id_kelas = $request->id_kelas;
        $siswa = pengguna::find($id_siswa);
        $siswa->id_kelas = $id_kelas;
        $siswa->save();
        return redirect('/home');
    }
    public function createTugas($id_bab)
    {
        if (session()->exists('is_login')) {
            $bab = bab::find($id_bab);
            return view("contents.createTugas", ['bab' => $bab]);
        } else {
            return redirect("/login");
        }
    }
    public function createTugasFinal(Request $request)
    {
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
    public function menuTugas($id)
    {
        if (session()->exists('is_login')) {
            $tugas = tugas::find($id);
            $deadline = date('Y-m-d H:i:s', strtotime("$tugas->deadline"));
            $interval = Carbon::now()->diff($deadline);
            $remaining = $interval->format('%y %m %d %h:%i:%s');
            $remaining = explode(" ", $remaining);
            $email = session('email');
            $data_user = pengguna::where('email', $email)->get();
            $id_siswa = $data_user[0]->id;
            $data_tugas = siswa_tugas::where('id_siswa', $id_siswa)->get();
            if (count($data_tugas) == 0) {
                $status = "Belum Mengumpulkan";
            } else {
                $status = "Sudah Mengumpulkan";
            }
            return view('contents.detailTugas', ['tugas' => $tugas, 'remaining' => $remaining, 'status' => $status, 'data_tugas' => $data_tugas]);
        } else {
            return redirect("/login");
        }
    }
    public function menuTugasProcess($id)
    {
        if (session()->exists('is_login')) {
            $tugas = tugas::find($id);
            $email = session('email');
            $data_user = pengguna::where('email', $email)->get();
            $id_siswa = $data_user[0]->id;
            return view('contents.uploadTugas', ['tugas' => $tugas, 'id_siswa' => $id_siswa]);
        } else {
            return redirect("/login");
        }
    }
    public function submitTugas(Request $request)
    {
        if ($files = $request->file('file')) {
            $files = $request->file('file');
            $lokasi = 'uploaded/tugas/';
            $nama_file = $files->getClientOriginalName();
            $pathTugas = $files->storeAs('tugas', $nama_file);
            $files->move($lokasi, $nama_file);
            $tugas_siswa = new siswa_tugas();
            $tugas_siswa->id_tugas = $request->id_tugas;
            $tugas_siswa->id_siswa = $request->id_siswa;
            $tugas_siswa->file_upload = $pathTugas;
            $tugas_siswa->save();
            return redirect('/home');
        } else {
            return redirect('/home');
        }
    }
    public function hapusTugas($id)
    {
        if (session()->exists('is_login')) {
            $tugas = tugas::find($id);
            $tugas->delete();
            return redirect("/home");
        } else {
            return redirect("/login");
        }
    }
    public function cekTugas($id, $id_bab)
    {
        if (session()->exists('is_login')) {
            $daftar_submission = siswa_tugas::where('id_tugas', $id)->get();
            $bab = bab::find($id_bab);
            return view('contents.tugasSubmission', ['daftar_submission' => $daftar_submission, 'bab' => $bab]);
        } else {
            return redirect("/login");
        }
    }
    public function downloadTugas($id)
    {
        if (session()->exists('is_login')) {
            $tugas = siswa_tugas::find($id);
            $nama_file = $tugas->file_upload;
            $filepath = public_path('uploaded/' . $nama_file);
            return Response()->download($filepath);
        } else {
            return redirect("/login");
        }
    }
    public function nilaiTugas(Request $request)
    {
        $id_submission = $request->id_submission;
        $nilai = $request->nilai;
        $submission = siswa_tugas::find($id_submission);
        $submission->nilai = $nilai;
        $submission->save();
        return redirect('/home');
    }
    public function updateDeskripsi(Request $request)
    {
        $id_mapel = $request->id_mapel;
        $deskripsi = $request->deskripsi;
        $mapel = mapel::find($id_mapel);
        $mapel->deskripsi = $deskripsi;
        $mapel->save();
        return redirect('/home');
    }
    public function createMateri($id)
    {
        if (session()->exists('is_login')) {
            $detail_bab = bab::find($id);
            return view("contents.createMateri", ['detail_bab' => $detail_bab]);
        } else {
            return redirect("/login");
        }
    }
    public function uploadMateri(Request $request)
    {
        if ($files = $request->file('file')) {
            $files = $request->file('file');
            $lokasi = 'uploaded/materi/';
            $nama_file = $files->getClientOriginalName();
            $pathMateri = $files->storeAs('materi', $nama_file);
            $files->move($lokasi, $nama_file);
            $materi = new materi();
            $materi->id_bab = $request->id_bab;
            $materi->nama = $request->nama;
            $materi->deskripsi = $request->deskripsi;
            $materi->file_upload = $pathMateri;
            $materi->save();
            return redirect('/home');
        } else {
            return redirect('/home');
        }
    }
    public function lihatMateri($id)
    {
        if (session()->exists('is_login')) {
            $materi = materi::find($id);
            $nama_file = $materi->file_upload;
            $filepath = public_path('uploaded/' . $nama_file);
            return Response()->download($filepath);
        } else {
            return redirect("/login");
        }
    }
    public function hapusMateri($id)
    {
        if (session()->exists('is_login')) {
            $materi = materi::find($id);
            $materi->delete();
            return redirect("/home");
        } else {
            return redirect("/login");
        }
    }
    public function createPengguna()
    {
        if (session()->exists('is_login')) {
            return view('contents.createPengguna');
        } else {
            return redirect("/login");
        }
    }
    public function registerPengguna(Request $request)
    {
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        $pengguna = new pengguna();
        $pengguna->Nama = $nama;
        $pengguna->email = $email;
        $pengguna->password = $password;
        $pengguna->role = $role;
        $pengguna->save();
        return redirect('/home');
    }
    public function updatePengguna($id)
    {
        if (session()->exists('is_login')) {
            $pengguna = pengguna::find($id);
            return view("contents.updatePengguna", ['pengguna' => $pengguna]);
        } else {
            return redirect("/login");
        }
    }
    public function updatePenggunaFinal(Request $request)
    {
        $id = $request->id;
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        $pengguna = pengguna::find($id);
        $pengguna->Nama = $nama;
        $pengguna->email = $email;
        $pengguna->password = $password;
        $pengguna->role = $role;
        $pengguna->save();
        return redirect('/home');
    }
    public function deletePengguna($id)
    {
        if (session()->exists('is_login')) {
            $pengguna = pengguna::find($id);
            $pengguna->delete();
            return redirect('/home');
        } else {
            return redirect("/login");
        }
    }
}
