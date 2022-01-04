@if(count($daftar_kelas) > 0)
@foreach($daftar_kelas as $kelas)
<p>{{ $kelas }}</p>
@endforeach
@else
<p>Tidak ada kelas</p>
@endif

<form action="{{route('upload kelas')}}" method="POST">
    @csrf
    <label for="">Nama Kelas</label>
    <input type="text" name="nama" id="">
    <label for="">Tahun Ajaran</label>
    <input type="text" name="tahun_ajaran" id="">
    <input type="submit" value="Buat Kelas">
</form>