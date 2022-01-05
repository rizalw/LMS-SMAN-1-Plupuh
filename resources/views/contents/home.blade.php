@if(Session::has('email'))
  Yaay berhasil login sebagai {{ $nama }}
  <a href="{{route('logout')}}">Logout</a><br>
  @foreach($data_siswa as $siswa)
  {{ $siswa->Nama }}<br>
  {{ $siswa->kelas->nama_kelas}}
  @endforeach
@endif