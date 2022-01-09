@extends("layout.navbarLogin")

@section("title")
<title>Dashboard Guru</title>
@endsection

@section("main")
<!-- Content -->
<div class="row" style="min-height: 90vh;">
    <div class="container w-75 py-3" style="background-color: #EEEFFA; min-height: 100%;">
    <div class="d-flex justify-content-between">
        <h3 class="mx-2" style="color: #13638F;">Selamat Datang, {{ session('nama')}}</h3>
        <a href="{{route('logout')}}" class="btn btn-danger mb-3 ms-auto">Logout</a><br>
    </div>
        <div class="container" style="background-color: white;">
            <h4 style="color: #13638F;" class="pt-3">Manage Course</h4>
            <div class="row">
                <!-- Mulai looping dari col -->
                @foreach($mapel as $m)
                <div class="col-4 px-5 pt-3 pb-4">
                    <div style="background-color: #EEEFFA; height: 10rem;">
                        <div style="background-color: orange; height: 5rem; position: relative;">
                            <p class="fw-bold" style="position: relative; top: 3em; left: 1em;">SMAN 1 PLUPUH TA {{ $m->kelas[0]->tahun_ajaran }}</p>
                        </div>
                        <a href="{{ route('lihat mapel guru', ['id' => $m->id ])}}" style="color: black; text-decoration:none">
                            <p class="fw-bold" style="position: relative; top: 2em; left: 1em;">{{ $m->nama }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection