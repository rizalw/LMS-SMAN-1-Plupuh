Mapel {{ $data_mapel->nama}}

<form action="{{route('assign mapel final')}}" method="POST">
    @csrf
    <input type="text" name="id_mapel" id="" value="{{ $data_mapel->id }}" hidden>
    <label for="">Kelas yang ingin diassign</label>
    <select name="id_kelas" id="">
        @foreach($daftar_kelas as $kelas)
        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
        @endforeach
    </select>
    <input type="submit" value="Submit">
</form>