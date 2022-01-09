Daftar siswa

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Siswa</th>
        <th>Action</th>
    </tr>
    @foreach($daftar_siswa as $siswa)
    <tr>
        <td>{{ $siswa->id }}</td>
        <td>{{ $siswa->Nama }}</td>
        <td><a href="{{ route('assign siswa process', ['id' => $siswa-> id ]) }}">Assign</a></td>
    </tr>
    @endforeach
</table>