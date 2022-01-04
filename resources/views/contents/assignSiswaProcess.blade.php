Siswa {{ $data_siswa->Nama}}

<form action="{{route('assign siswa final')}}" method="POST">
    @csrf
    <input type="text" name="siswa" id="" value="{{ $data_siswa->id }}" hidden>
    <label for="">Kelas yang ingin diassign</label>
    <select name="id_kelas" id="">
        @foreach($daftar_kelas as $kelas)
        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
        @endforeach
    </select>
    <input type="submit" value="Submit">
</form>