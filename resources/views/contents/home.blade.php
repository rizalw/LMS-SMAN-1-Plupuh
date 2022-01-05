@if(Session::has('email'))
  Yaay berhasil login sebagai {{ $nama }}
  <a href="{{route('logout')}}">Logout</a><br>
  {{ $data_siswa->Nama }}<br><br>
  Siswa ini berada di kelas<br>
  {{ $data_siswa->kelas->nama_kelas}}<br><br>
  Kelas ini memiliki mata pelajaran berikut<br>
  @foreach($data_siswa->kelas->mapels as $mapel)
  {{ $mapel->nama }}
  @endforeach
@endif