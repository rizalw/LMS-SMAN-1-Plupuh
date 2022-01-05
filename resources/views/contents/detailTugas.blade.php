<p>Nama Tugas : {{ $tugas->nama }}</p>
<p>Deadline Tugas : {{ $tugas->deadline }}</p>
<?php 
$waktu = explode(":", $remaining[3]);
?>
<p>Siswa Waktu : {{ $remaining[2] }} hari, <?=  $waktu[0] ?> jam, <?=  $waktu[1] ?> menit, <?=  $waktu[2] ?> detik</p>
<p>Status : {{ $status }}</p>
<a href="{{ route('menu tugas process', ['id' => $tugas -> id ]) }}">Add Submission</a>