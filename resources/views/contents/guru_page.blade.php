ini page buat guru

@foreach($mapel as $m)
<p>{{ $m }}</p>
<p>Daftar Bab yang sudah ada</p>
@foreach($bab as $b)
@if($m->id == $b->id_mapel)
<?= $b ?>
@endif
@endforeach<br>
Click <a href="{{ route('create bab', ['id' => $m-> id ]) }}">here</a> to create new bab
@endforeach

<a href="{{route('logout')}}">Logout</a>