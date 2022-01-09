@extends("layout.navbarLogin")

@section("title")
<title>Tambah Tugas</title>
@endsection

@section("main")
<div class="container shadow bg-light mt-1">
    <div class="text-center display-6">Buat Tugas Baru</div>
    <form action="{{ route('create tugas final') }}" method="POST">
        @csrf
        <input type="text" name="id_bab" id="" value="{{ $bab->id }}" class="form-control" hidden>
        <label for="" class="form-text">Nama Tugas</label><br>
        <input type="text" name="nama" id="" class="form-control"><br>
        <label for="" class="form-text">Deskripsi Tugas</label><br>
        <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea><br>
        <label for="" class="form-text">Tenggat hari</label><br>
        <input type="date" name="tanggal" id="" class="form-control"><br>
        <label for="" class="form-text">Tenggat Waktu</label><br>
        <input type="time" name="waktu" id="" class="form-control"><br>
        <input type="submit" value="Buat tugas" class="btn btn-primary mb-3">
    </form>
</div>
@endsection