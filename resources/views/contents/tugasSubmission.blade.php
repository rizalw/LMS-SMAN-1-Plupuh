@extends("layout.navbarLogin")

@section("title")
<title>Input Nilai</title>
@endsection

@section("main")
<!-- Content -->
<div class="container w-75 mx-auto py-3" style="background-color: #EEEFFA; min-height: 100%; margin-bottom:180px">
    <h3 class="mx-2" style="color: #13638F;"></h3>
    <p class="mx-2" style="color: #13638F;"> <a href="dashboardSiswa.html" style="text-decoration: none; color: #13638F;">Dashboard</a> / <a href="profileSiswa.html" style="text-decoration: none; color: #13638F;">Course</a> / <a href="matpelPage.html" style="text-decoration: none; color: #13638F;">{{ $daftar_submission[0]->tugas->babs->mapels->nama }}</a> / {{ $daftar_submission[0]->tugas->nama }}</p>
    <div class="container" style="background-color: white;">
        <h4 style="color: #13638F;" class="text-center">Pengumpulan {{ $daftar_submission[0]->tugas->nama }}</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">File Submission</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($daftar_submission as $submission)
                @if($submission->tugas->babs->id == $bab->id)
                <tr>
                    <form action="{{ route('nilai tugas') }}" method="POST">
                        @csrf
                        <td>{{ $submission->siswas->Nama }}</td>
                        <td>
                            <a href="{{ route('download tugas', ['id' => $submission-> id ]) }}" style="color: black; text-decoration:none">Download Submission</a>
                        </td>
                        <td>
                            <input type="number" name="id_submission" id="" value="{{ $submission->id }}" hidden>
                            <input type="number" name="nilai" id="" value="{{ $submission->nilai }}">
                        </td>
                        <td>
                            <input type="submit" value="Update" class="btn btn-primary">
                        </td>
                    </form>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection