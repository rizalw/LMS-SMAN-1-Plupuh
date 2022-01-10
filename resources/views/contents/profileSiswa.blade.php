@extends("layout.navbarLogin")
@section("title")
<title>Dashboard Siswa</title>
@endsection

@section('main')
<!-- Content -->
<div class="container-fluid w-100" style="padding: 2% 8%;">
    <div class="w-100" style="border-radius: 10px; height: 15rem; position: relative; z-index: 1; background-color: #004267;">

    </div>
    <div class="bg-white w-100 d-flex justify-content-between px-5 pb-3" style="border-radius: 10px; margin-top: -5rem; position: relative;">
        <div class="d-flex">
            <div style="height: 10rem; width: 10rem; background-color: gray; border: solid 2px white; border-radius: 50%; background-image: url({{ asset('images/rafi.jpg') }}); background-repeat: no-repeat; background-position :center; background-size: cover; position: relative; z-index: 1000;">
            </div>
            <div style="padding-top: 7rem;" class="ms-3">
                <h3 class="m-0">{{ $siswa->Nama}}</h3>
                <?php if(isset($siswa->kelas->nama_kelas)): ?>
                <p class="fw-bold">{{ $siswa->kelas->nama_kelas}}</p>
                <?php endif;?>
            </div>
        </div>
        <a href="{{ route('logout') }}">
            <button class="btn text-white" style="height: 3rem; width: 6rem; margin-top: 7rem; background-color: #004267;">Logout</button>
        </a>
    </div>
</div>

<div class="container-fluid w-100 mb-5" style="padding: 2% 8%;">
    <div class="bg-white p-3" style="border-radius: 10px;">
        <h3>Course</h3>
        <?php if(isset($data_siswa->kelas->mapels)): ?>
        @foreach($siswa->kelas->mapels as $mapel)
        <div class="row">
            <!-- Mulai looping dari col -->
            <div class="col-4 px-5 py-3">
                <div style="background-color: #EEEFFA; height: 10rem;">
                    <div style="background-color: orange; height: 5rem; position: relative;">
                        <p class="fw-bold" style="position: relative; top: 3em; left: 1em;">{{ $mapel->nama}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <?php endif;?>
    </div>
</div>
@endsection