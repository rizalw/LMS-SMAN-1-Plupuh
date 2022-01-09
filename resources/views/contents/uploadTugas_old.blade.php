<form action="{{ route('submit tugas') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="number" name="id_siswa" id="" value="{{ $id_siswa }}" hidden>
    <input type="number" name="id_tugas" id="" value="{{ $tugas->id }}" hidden>
    <label for="">Upload File</label>
    <input type="file" name="file" id="">
    <input type="submit" value="Submit Tugas">
</form>