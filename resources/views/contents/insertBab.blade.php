@extends("layout.navbarLogin")

@section('title')
<title>Tambah Bab</title>
@endsection

@section('main')
<div class="container shadow bg-light p-5 mt-2">
    <div class="display-6 text-center">Tambah Bab<br><small>Mata Pelajaran {{ $mapel->nama}}</small></div>
    <form action="{{ route('upload bab') }}" method="post">
        @csrf
        <input type="text" name="id_mapel" id="" hidden value="{{ $mapel->id }}" class="form-control">
        <label for="" class="form-text">Nama Bab</label>
        <input type="text" name="nama" id="" class="form-control">
        <label for="" class="form-text">Deskripsi Bab</label>
        <input type="text" name="deskripsi" id="" class="form-control">
        <input type="submit" value="Masukkan Bab" class="btn btn-primary mt-2">
    </form>

</div>
@endsection