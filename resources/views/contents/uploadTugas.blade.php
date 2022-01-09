@extends("layout.navbarLogin")
@section("title")
<title>Pengumpulan Tugas Page 2</title>
@endsection

@section("main")
<!-- Content -->
<div class="container w-75 m-auto py-3" style="background-color: #EEEFFA; min-height: 100%;">
    <h3 class="mx-2" style="color: #13638F;">{{ $tugas->babs->mapels->nama }} {{ $tugas->babs->mapels->kelas[0]->nama_kelas }}</h3>
    <p class="mx-2" style="color: #13638F;"><a href="">Dashboard</a> / <a href="">Course</a> / <a href="" class="">{{ $tugas->babs->mapels->nama }}</a> / <a href="">{{ $tugas->babs->nama }}</a> / <a href="">
            {{ $tugas->nama }}</a></p>

    <div class="container" style="background-color: white;">
        <h4 style="color: #13638F;" class="text-center">Pengumpulan {{ $tugas->nama }}</h4>
        <form action="{{ route('submit tugas') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="number" name="id_siswa" id="" value="{{ $id_siswa }}" hidden>
            <input type="number" name="id_tugas" id="" value="{{ $tugas->id }}" hidden>
            <div class="container border border-primary" style="width: 70%; padding-bottom: 400px">
                <input type="file" name="file" id="" class="form-control">
            </div>
            <input type="submit" value="Submit Tugas" class="btn btn-success mx-auto d-block mt-2">
        </form>

    </div>

</div>
@endsection