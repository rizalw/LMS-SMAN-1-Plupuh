@extends("layout.navbarLogin")

@section("title")
<title>Pengumpulan {{ $tugas->nama}}1</title>
@endsection

@section("main")
<!-- Content -->
<div class="container w-75 m-auto py-3 mb-5" style="background-color: #EEEFFA; min-height: 100%;">
    <h3 class="mx-2" style="color: #13638F;">{{ $tugas->babs->mapels->nama }} {{ $tugas->babs->mapels->kelas[0]->nama_kelas }}</h3>
    <p class="mx-2" style="color: #13638F;"><a href="">Dashboard</a> / <a href="">Course</a> / <a href="" class="">{{ $tugas->babs->mapels->nama }}</a> / <a href="">{{ $tugas->babs->nama }}</a> / <a href="">
            {{ $tugas->nama }}</a>
    </p>
    <div class="container" style="background-color: white;">
        <h4 style="color: #13638F;" class="text-center">Pengumpulan {{$tugas->nama}}</h4>
        <h6 style="color: #13638F;" class="text-center">{{$tugas->deskripsi}}</h5>

            <div class="p-3 mb-3" style="margin-left: 100px; margin-right: 100px;">

                <div class="row mb-3 p-2" style="background-color:<?= ($status == "Belum Mengumpulkan") ? "#EEEFFA" : "#B8EDB0" ?>">
                    <div class="col-2">
                        <p class="m-0" style="color: #13638F;">Status</p>
                    </div>
                    <div class="col-1">
                        <p class="m-0" style="color: #004267;">:</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="color: #004267;">{{ $status }}</p>
                    </div>
                </div>

                <div class="row mb-3 p-2" style="background-color: #EEEFFA;">
                    <div class="col-2">
                        <p class="m-0" style="color: #13638F;">Tenggat Waktu</p>
                    </div>
                    <div class="col-1">
                        <p class="m-0" style="color: #004267;">:</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="color: #004267;">{{ $tugas->deadline }} WIB</p>
                    </div>
                </div>

                <div class="row mb-3 p-2" style="background-color: #EEEFFA;">
                    <div class="col-2">
                        <p class="m-0" style="color: #13638F;">Sisa Waktu</p>
                    </div>
                    <div class="col-1">
                        <p class="m-0" style="color: #004267;">:</p>
                    </div>
                    <div class="col-8">
                        <?php
                        $waktu = explode(":", $remaining[3]);
                        ?>
                        <p class="m-0" style="color: #004267;">{{ $remaining[1]}} bulan, {{ $remaining[2] }} hari, <?= $waktu[0] ?> jam, <?= $waktu[1] ?> menit</p>
                    </div>
                </div>

                <div class="row mb-3 p-2" style="background-color: #EEEFFA;">
                    <div class="col-2">
                        <p class="m-0" style="color: #13638F;">Terakhir Diubah</p>
                    </div>
                    <div class="col-1">
                        <p class="m-0" style="color: #004267;">:</p>
                    </div>
                    <div class="col-8">
                        <?php if (isset($data_tugas[0])) : ?>
                            <p class="m-0" style="color: #004267;">{{ $data_tugas[0]->updated_at }} WIB</p>
                        <?php else : ?>
                            <p class="m-0" style="color: #004267;"></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3 p-2" style="background-color: #EEEFFA;">
                    <div class="col-2">
                        <p class="m-0" style="color: #13638F;">Nilai</p>
                    </div>
                    <div class="col-1">
                        <p class="m-0" style="color: #004267;">:</p>
                    </div>
                    <div class="col-8">
                        <?php if (isset($data_tugas[0])) : ?>
                            <p class="m-0" style="color: #004267;">{{ $data_tugas[0]->nilai }}</p>
                        <?php else : ?>
                            <p class="m-0" style="color: #004267;"></p>
                        <?php endif; ?>
                    </div>
                </div>
                @if(isset($data_tugas[0]))
                <a href="{{ route('hapus tugas', ['id' => $data_tugas[0]-> id ]) }}">
                    <button class="btn btn-danger" style="height: 3rem; width: 8rem; margin-top: 3rem;">Hapus Tugas</button>
                </a>
                @else
                <a href="{{ route('menu tugas process', ['id' => $tugas -> id ]) }}">
                    <button class="btn text-white" style="height: 3rem; width: 8rem; margin-top: 3rem; background-color: #004267;">Tambah Tugas</button>
                </a>
                @endif
            </div>
    </div>
</div>
@endsection