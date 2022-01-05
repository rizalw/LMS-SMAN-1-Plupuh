@foreach($daftar_submission as $submission)
    <p>Nama Siswa : {{ $submission->siswas->Nama }}</p>
    <p>Nama Tugas : {{ $submission->tugas->nama }}</p>
    <p>Waktu Submission : {{ $submission->updated_at }}</p>
    <a href="{{ route('download tugas', ['id' => $submission-> id ]) }}">Download Submission</a>
@endforeach