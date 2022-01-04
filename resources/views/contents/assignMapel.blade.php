<table border="1">
    <tr>
        <th>Nama Mapel</th>
        <th>Action</th>
    </tr>
    @foreach($daftar_mapel as $mapel)
    <tr>
        <td>{{ $mapel-> nama }}</td>
        <td>
            <a href="{{ route('assign mapel process', ['id' => $mapel-> id ]) }}">Assign</a>
        </td>
    </tr>
    @endforeach
</table>