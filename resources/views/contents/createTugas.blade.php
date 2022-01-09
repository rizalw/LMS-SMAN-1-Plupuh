{{ $bab->deskripsi }}
<form action="{{ route('create tugas final') }}" method="POST">
    @csrf
    <input type="text" name="id_bab" id="" value="{{ $bab->id }}" hidden>
    <label for="">Nama Tugas</label><br>
    <input type="text" name="nama" id=""><br>
    <label for="">Deskripsi Tugas</label><br>
    <textarea name="deskripsi" id="" cols="30" rows="10"></textarea><br>
    <label for="">Tenggat hari</label><br>
    <input type="date" name="tanggal" id=""><br>
    <label for="">Tenggat Waktu</label><br>
    <input type="time" name="waktu" id=""><br>
    <input type="submit" value="Buat tugas">
</form>