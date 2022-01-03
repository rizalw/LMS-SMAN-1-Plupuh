Ini halaman untuk insert bab baru dari mapel {{ $mapel->nama}}

<form action="{{ route('upload bab') }}" method="post">
    @csrf
    <input type="text" name="id_mapel" id="" hidden value="{{ $mapel->id }}">
    <label for="">Nama Bab</label>
    <input type="text" name="nama" id="">
    <label for="">Deskripsi Bab</label>
    <input type="text" name="deskripsi" id="">
    <input type="submit" value="Masukkan Bab">
</form>