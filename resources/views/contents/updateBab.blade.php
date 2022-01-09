@extends("layout.navbarLogin")

@section('title')
<title>Tambah Bab</title>
@endsection

@section('main')
<div class="container shadow bg-light p-5 mt-2">
    <div class="display-6 text-center">Update Bab<br><small>Mata Pelajaran {{ $bab->mapels->nama}}</small></div>
    <form action="{{ route('update bab final') }}" method="post">
        @csrf
        <input type="text" name="id_bab" id="" hidden value="{{ $bab->id }}" class="form-control">
        <label for="" class="form-text">Nama Bab</label>
        <input type="text" name="nama" id="" class="form-control" value="{{ $bab->nama }}">
        <label for="" class="form-text">Deskripsi Bab</label>
        <input type="text" name="deskripsi" id="" class="form-control" value="{{ $bab->deskripsi }}">
        <input type="submit" value="Update Bab" class="btn btn-primary mt-2">
    </form>

</div>
@endsection