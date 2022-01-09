@extends("layout.navbarLogin")
@section("title")
<title>Dashboard Siswa</title>
@endsection("title")
<style>
    html,
    body {
        height: 100%;
        overflow-x: hidden;
    }
</style>

<!-- <body style="background-color: #C2E8F9; "> -->
@section("main")
<!-- Content -->
<div style="background-color: #C2E8F9; ">
    <div class="row" style="min-height: 90vh;">
        <div class="col-9">
            <div class="container w-75 m-auto me-0 py-3" style="background-color: #EEEFFA; min-height: 100%;">
                <h3 class="mx-2" style="color: #13638F;">Selamat Datang, {{ $nama }}</h3>
                <div class="container p-3" style="background-color: white;">
                    <h4 style="color: #13638F;">Course</h4>
                    @foreach($data_siswa->kelas->mapels as $mapel)
                    <div class="p-3 mb-3" style="background-color: #EEEFFA;">
                        <div class="row">
                            <div class="col-2">
                                <p class="m-0" style="color: #13638F;">{{ $data_siswa->kelas->tahun_ajaran}}</p>
                            </div>
                            <div class="col-3">
                                <a href="">
                                    <p class="m-0" style="color: #004267;">{{ $mapel->nama}}</p>
                                </a>
                            </div>
                            <div class="col-7">
                                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-3 px-5 mt-3">
            <h4 class="text-center" style="color: #004267;">Tugas yang akan datang</h4>
            @foreach($daftar_tugas as $tugas)
            <div class="bg-light p-2 mb-3">
                <div style="color: #13638F;" class="mt-1 d-flex mb-3">
                    <img src="images/Task Planning.png" alt="" style="height: 1.5em;">
                    <a href="">
                        <p class="m-0 ms-3">Pengumpulan {{ $tugas->nama}} </p>
                    </a>
                </div>
                <p class="m-0" style="color: #13638F;">{{ $tugas->deadline}}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection