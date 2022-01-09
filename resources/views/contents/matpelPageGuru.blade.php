@extends('layout.navbarLogin')

@section('title')
<title>Mata Pelajaran {{ $mapel->nama}}</title>
@endsection

@section("main")
<!-- Content -->
<div class="container mb-5 pb-1" style="background-color: #EEEFFA; min-height: 100vh;">
    <h4 class="mx-2 pt-3" style="color: #13638F;">{{ $mapel->nama}} {{ $mapel->kelas[0]->nama_kelas}}</h4>
    <p class="mx-2" style="color: #13638F;"><a href="/home" style="color: black; text-decoration:none;">Dashboard</a> / <a href="/home" style="color: black; text-decoration:none;">Course</a> / {{ $mapel->nama }}</p>

    <div class="container py-2" style="background-color: white;">
        <div class="row">
            <div class="col-10">
                <h5 style="color: #13638F;">Deskripsi Mata Pelajaran {{ $mapel->nama }}</h5>
                <p style="color: #13638F;" class="mx-2">{{ $mapel->deskripsi }}</p>
            </div>
            <div class="col-2 d-flex justify-content-center">
                <a href="#" style="color: black; text-decoration:none;" data-bs-toggle="modal" data-bs-target="#modalDeskripsi">Update Deskripsi</a>
            </div>
        </div>
        <!-- Modal Deskripsi -->
        <div class="modal fade" id="modalDeskripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('update deskripsi') }}" method="post">
                        <div class="modal-body">
                            @csrf
                            <input type="number" name="id_mapel" id="" value="{{ $mapel->id }}" class="form-control" hidden>
                            <label for="" class="form-text">Deskripsi Mata Pelajaran</label><br>
                            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control">{{ $mapel->deskripsi}}</textarea><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Update Deskripsi" class="btn btn-primary mt-2">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($daftar_bab as $bab)
    <div class="container pt-2 pb-3 mt-4" style="background-color: white;">
        <div class="row">
            <div class="col-10">
                <h5 style="color: #13638F;">{{ $bab->nama }}</h5>

                <div style="color: #13638F;" class="mt-1">
                    <b>Deskripsi</b><br>
                    {{ $bab->deskripsi }}
                </div>

                <div style="color: #13638F;" class="">
                    <b>Materi Pembelajaran</b>
                    @foreach($daftar_materi as $materi)
                    @if($materi->id_bab == $bab->id)
                    <div class="row">
                        <div class="col-3">
                            <div style="color: #13638F;" class="mt-1 d-flex">
                                <img src="{{ asset('images/music video.png') }}" alt="" style="height: 1.5em;">
                                <a href="{{ route('lihat materi', ['id' => $materi->id ]) }}" style="color: black; text-decoration:none;">
                                    <p class="m-0">{{ $materi->nama}}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-9">
                            <a href="{{ route('hapus materi', ['id' => $materi->id ]) }}" style="color:red;">Hapus Materi</a>
                        </div>
                    </div>
                    <p>{{ $materi->deskripsi}}</p>
                    @endif
                    @endforeach
                    <a href="{{ route('create materi', ['id' => $bab->id ])}}" style="color:black;">Tambah Materi</a>
                </div>
                <!-- Tugas dan Latihan -->
                <div style="color: #13638F;" class="mt-3">
                    <b>Tugas</b><br>
                    @foreach($daftar_tugas as $tugas)
                    @if($tugas->id_bab == $bab->id)
                    <div class="row">
                        <div class="col-3">
                            <div style="color: #13638F;" class="mt-3 d-flex ms-1 my-2">
                                <img src="{{ asset('images/Brief.png') }}" alt="" style="height: 1.5em;">
                                <a href="{{ route('menu tugas', ['id' => $tugas -> id ]) }}" style="color: black; text-decoration:none;">
                                    <p class="m-0">{{ $tugas->nama }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-9">
                            <a href="{{ route('hapus tugas', ['id' => $tugas-> id ]) }}" style="color: red;">Hapus tugas</a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <a href="{{ route('create tugas', ['id' => $bab->id ])}}" style="color:black;">Tambah Tugas</a>
                </div>
            </div>
            <div class="col-2 d-flex justify-content-around">
                <a href="{{ route('update bab', ['id'=> $bab->id]) }}" style="color: black; text-decoration:none;">Update Bab</a>
                <a href="{{ route('delete bab', ['id'=> $bab->id]) }}" style="color: red; text-decoration:none;">Delete Bab</a>
            </div>
        </div>
    </div>
    @endforeach
    <a href="{{ route('create bab', ['id' => $mapel-> id ]) }}">
        <button class="btn btn-primary w-25 mx-auto d-block my-3">Tambah Bab Baru</button>
    </a>
</div>
@endsection