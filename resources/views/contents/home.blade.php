@if(Session::has('email'))
  Yaay berhasil login sebagai {{ $nama }}
  <a href="{{route('logout')}}">Logout</a><br>
  {{ $data_siswa->Nama }}<br><br>
  Siswa ini berada di kelas<br>
  {{ $data_siswa->kelas->nama_kelas}}<br><br>
  Kelas ini memiliki mata pelajaran berikut<br>
  @foreach($data_siswa->kelas->mapels as $mapel)
    {{ $mapel->nama }}<br><br>
    Daftar Tugas di mapel tersebut<br>
    @foreach($daftar_tugas as $tugas)
      @if( $tugas->babs->mapels->id == $mapel->id)
      <a href="{{ route('menu tugas', ['id' => $tugas -> id ]) }}">
        {{ $tugas->nama}}
      </a>
      @endif
    @endforeach
  @endforeach
@endif