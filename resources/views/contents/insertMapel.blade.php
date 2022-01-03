<form action="{{ route('upload mapel') }}" method="post">
    @csrf
    <label for="">Nama Mapel</label>
    <input type="text" name="nama_mapel" required>
    <label for="">Nama Guru</label>
    <select name="nama_guru" id="">
        @foreach($guru as $g)
        <option value="{{ $g->email }}">{{ $g->email }}</option>
        @endforeach
    </select><br>
    <label for="">Deskripsi Mata Pelajaran</label><br>
    <textarea name="deskripsi" id="" cols="30" rows="10"></textarea><br>
    <input type="submit" value="Tambah mapel">
</form>