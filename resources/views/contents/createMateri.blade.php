<form action=" {{ route('upload materi') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="number" name="id_bab" id="" value="{{ $detail_bab->id }}" hidden>
    <label for="">Nama Materi</label><br>
    <input type="text" name="nama" id=""><br>
    <label for="">Deskripsi Materi</label><br>
    <textarea name="deskripsi" id="" cols="30" rows="10"></textarea><br>
    <label for="">Upload materi</label>
    <input type="file" name="file" id=""><br>
    <input type="submit" value="Submit materi">
</form>