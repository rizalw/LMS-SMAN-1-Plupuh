ini page buat guru

@foreach($mapel as $m)
<p>{{ $m }}</p>
Click <a href="{{ route('create bab', ['id' => $m-> id ]) }}">here</a> to create new bab
@endforeach