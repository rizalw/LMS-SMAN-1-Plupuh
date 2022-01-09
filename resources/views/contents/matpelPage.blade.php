@extends('layout.navbarLogin')

@section('title')
<title>Mata Pelajaran {{ $mapel->nama}}</title>
@endsection

@section("main")
<!-- Content -->
<div class="container mb-5" style="background-color: #EEEFFA; min-height: 100vh;">
    <h4 class="mx-2 pt-3" style="color: #13638F;">{{ $mapel->nama}} {{ $mapel->kelas[0]->nama_kelas}}</h4>
    <p class="mx-2" style="color: #13638F;"><a href="">Dashboard</a> / <a href="">Course</a> / {{ $mapel->nama }}</p>

    <div class="container py-2" style="background-color: white;">
        <h5 style="color: #13638F;">Deskripsi Mata Pelajaran {{ $mapel->nama }}</h5>
        <p style="color: #13638F;" class="mx-2">{{ $mapel->deskripsi }}</p>
    </div>
    @foreach($daftar_bab as $bab)
    <div class="container pt-2 pb-3 mt-4" style="background-color: white;">
        <h5 style="color: #13638F;">{{ $bab->nama }}</h5>

        <div style="color: #13638F;" class="mt-1">
            <b>Deskripsi</b><br>
            {{ $bab->deskripsi }}
        </div>

        <div style="color: #13638F;" class="mt-3">
            <b>Materi Pembelajaran</b>
            @foreach($daftar_materi as $materi)
            @if($materi->id_bab == $bab->id)
            <p>{{ $materi->deskripsi}}</p>
            <div style="color: #13638F;" class="mt-1 d-flex">
                <img src="{{ asset('images/music video.png') }}" alt="" style="height: 1.5em;">
                <a href="{{ route('lihat materi', ['id' => $materi->id ]) }}">
                    <p class="m-0">{{ $materi->nama}}</p>
                </a>
            </div>
            @endif
            @endforeach
        </div>

        <!-- Tugas dan Latihan -->
        <div style="color: #13638F;" class="mt-3">
            <b>Tugas</b>
            @foreach($daftar_tugas as $tugas)
            @if($tugas->id_bab == $bab->id)
            <div style="color: #13638F;" class="mt-1 d-flex ms-1">
                <img src="{{ asset('images/Brief.png') }}" alt="" style="height: 1.5em;">
                <a href="{{ route('menu tugas', ['id' => $tugas -> id ]) }}">
                    <p class="m-0">{{ $tugas->nama }}</p>
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection