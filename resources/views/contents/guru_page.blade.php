ini page buat guru<br>

@foreach($mapel as $m)
<p>Daftar Mapel</p>
<p>{{ $m }}</p>
<p>Daftar Bab yang sudah ada</p>
@foreach($bab as $b)
@if($m->id == $b->id_mapel)
<?= $b ?><br>
Click <a href="{{ route('create tugas', ['id' => $b-> id ]) }}">here</a> to create tugas for this bab
@endif
@endforeach<br><br>
Click <a href="{{ route('create bab', ['id' => $m-> id ]) }}">here</a> to create new bab
@endforeach
<br>
<a href="{{route('logout')}}">Logout</a>