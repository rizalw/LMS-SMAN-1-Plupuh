<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="pb-5">
    <div class="display-5 text-center py-5">Welcome to Admin Page</div>
    <div class="container">
        <a href="{{route('logout')}}" class="btn btn-danger mb-3">Logout</a><br>
        <section id="tabel_pengguna">
            <div class="fs-2 mb-2">Tabel Pengguna</div>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach($pengguna as $p)
                    <tr>
                        <th class="text-center"><?= $i ?></th>
                        <td>{{ $p->Nama}}</td>
                        <td>{{ $p->email}}</td>
                        <?php if (isset($p->kelas->nama_kelas)) : ?>
                            <td class="text-center">{{ $p->kelas->nama_kelas}}</td>
                        <?php else : ?>
                            <td class="text-center">-</td>
                        <?php endif; ?>
                        <td class="text-center">{{ $p->role }}</td>
                        <td class="text-center">
                            <?php if ($p->role == "siswa") : ?>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalSiswa">Assign Siswa</button>
                            <?php endif; ?>
                            <a href="{{ route('update pengguna', ['id' => $p->id ]) }}">
                                <button class="btn btn-primary">Update</button>
                            </a>
                            <a href="{{ route('delete pengguna', ['id' => $p->id ]) }}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modalSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Assign Siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('assign siswa final')}}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        <input type="text" name="id_siswa" id="" value="{{ $p->id }}" hidden>
                                        <label for="" class="form-text">Kelas yang ingin diassign</label>
                                        <select name="id_kelas" id="" class="form-control">
                                            <option value="" selected></option>
                                            @foreach($kelas as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Save Changes" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('create pengguna') }}">
                <button class="btn btn-primary">Buat pengguna baru</button>
            </a>
        </section>
        <section id="tabel_kelas" class="mt-5">
            <div class="fs-2 mb-2">Tabel Kelas</div>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Tahun Ajaran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach($kelas as $k)
                    <tr>
                        <th class="text-center"><?= $i ?></th>
                        <td class="text-center">{{ $k->nama_kelas}}</td>
                        <td class="text-center">{{ $k->tahun_ajaran}}</td>
                        <td class="text-center">
                            <a href="{{ route('update kelas', ['id' => $k->id ]) }}">
                                <button class="btn btn-primary">Update</button>
                            </a>
                            <a href="{{ route('delete kelas', ['id' => $k->id ]) }}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('create kelas') }}">
                <button class="btn btn-primary">Buat Kelas baru</button>
            </a>
        </section>
        <section id="tabel_mapel" class="mt-5">
            <div class="fs-2 mb-2">Tabel Mata Pelajaran</div>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach($mapel as $m)
                    <tr>
                        <th class="text-center"><?= $i ?></th>
                        <td class="text-center">{{ $m->nama}}</td>
                        <td class="text-center">{{ $m->penggunas->Nama}}</td>
                        <td class="text-center">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalkelas">Assign Kelas</button>
                            <a href="{{ route('update mapel', ['id' => $m->id ]) }}">
                                <button class="btn btn-primary">Update</button>
                            </a>
                            <a href="{{ route('delete mapel', ['id' => $m->id ]) }}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="modalkelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Assign Kelas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('assign mapel final')}}" method="post">
                                        <div class="modal-body">
                                            @csrf
                                            <input type="text" name="id_mapel" id="" value="{{ $m->id }}" hidden>
                                            <label for="" class="form-text">Kelas yang ingin diassign</label>
                                            <select name="id_kelas" id="" class="form-control">
                                                <option value="" selected></option>
                                                @foreach($kelas as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" value="Save Changes" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('create mapel') }}">
                <button class="btn btn-primary">Buat Mapel baru</button>
            </a>
        </section>
    </div>
</body>

</html>