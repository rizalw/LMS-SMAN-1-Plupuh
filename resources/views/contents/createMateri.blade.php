@extends("layout.navbarLogin")

@section("title")
<title>Tambah Materi</title>
@endsection

@section("main")
<div class="container bg-light shadow mt-1">
    <div class="display-6 text-center">Buat Materi Baru</div>
    <form action=" {{ route('upload materi') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="number" name="id_bab" id="" value="{{ $detail_bab->id }}" class="form-control" hidden>
        <label for="" class="form-text">Nama Materi</label><br>
        <input type="text" name="nama" id="" class="form-control"><br>
        <label for="" class="form-text">Deskripsi Materi</label><br>
        <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea><br>
        <label for="" class="form-text">Upload materi</label>
        <input type="file" name="file" id="" class="form-control"><br>
        <input type="submit" class="btn btn-primary mb-2" value="Submit materi">
    </form>
</div>
@endsection