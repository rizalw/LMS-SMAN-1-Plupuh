ini page buat guru<br>

@foreach($mapel as $m)
    <p>Daftar Mapel</p>
    <p>{{ $m }}</p>
    <p>Daftar Bab yang sudah ada<br>
    @foreach($bab as $b)
        @if($m->id == $b->id_mapel)
            <?= $b->nama ?><br>
            <p>Daftar tugas untuk bab ini</p>
            @foreach($daftar_tugas as $tugas)
                @if($tugas->id_bab == $b->id)
                    {{ $tugas->nama }}<br>
                    <a href="{{ route('cek tugas', ['id' => $tugas-> id ]) }}">
                        <p>Cek submission</p>
                    </a>
                @endif
            @endforeach
            Click <a href="{{ route('create tugas', ['id' => $b-> id ]) }}">here</a> to create tugas for this bab<br><br>
            @foreach($daftar_materi as $materi)
                @if($materi->id_bab == $b->id)
                    <a href="{{ route('lihat materi', ['id' => $materi-> id ]) }}">{{ $materi->nama }}</a><br>
                @endif
            @endforeach
            Click <a href="{{ route('create materi', ['id' => $b-> id ]) }}">here</a> to create materi for this bab
        @endif
    @endforeach<br><br>
Click <a href="{{ route('create bab', ['id' => $m-> id ]) }}">here</a> to create new bab
@endforeach
<br>
<a href="{{route('logout')}}">Logout</a>