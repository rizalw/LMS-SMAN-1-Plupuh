@foreach($daftar_submission as $submission)
    <p>Nama Siswa : {{ $submission->siswas->Nama }}</p>
    <p>Nama Tugas : {{ $submission->tugas->nama }}</p>
    <p>Waktu Submission : {{ $submission->updated_at }}</p>
    <a href="{{ route('download tugas', ['id' => $submission-> id ]) }}">Download Submission</a>
    <form action="{{ route('nilai tugas') }}" method="POST">
        @csrf
        <input type="number" name="id_submission" id="" value="{{ $submission->id }}" hidden>
        <input type="number" name="nilai" id="">
        <input type="submit" value="Submit">
    </form>
@endforeach