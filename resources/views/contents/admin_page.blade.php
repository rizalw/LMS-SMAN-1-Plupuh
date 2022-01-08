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

<body>
    <div class="display-5 text-center py-5">Welcome to Admin Page</div>
    <div class="container">
        <div class="fs-2 mb-2">Tabel Pengguna</div>
        <table class="table table-striped">
            <thead class="text-center">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID</th>
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
                    <td class="text-center">{{ $p->id}}</td>
                    <td>{{ $p->Nama}}</td>
                    <td>{{ $p->email}}</td>
                    <?php if (isset($p->kelas->nama_kelas)) : ?>
                        <td class="text-center">{{ $p->kelas->nama_kelas}}</td>
                    <?php else : ?>
                        <td class="text-center">-</td>
                    <?php endif; ?>
                    <td class="text-center">{{ $p->role }}</td>
                    <td class="text-center">
                        <a href="{{ route('update pengguna', ['id' => $p->id ]) }}">
                            <button class="btn btn-primary">Update</button>
                        </a>
                        <a href="{{ route('delete pengguna', ['id' => $p->id ]) }}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('create pengguna') }}">
            <button class="btn btn-primary">Buat pengguna baru</button>
        </a>
    </div>
    Click <a href="{{ route('create mapel') }}">here </a>to insert new mapel<br>
    Click <a href="{{ route('create kelas') }}">here </a>to create new kelas<br>
    Click <a href="{{ route('assign mapel') }}">here </a>to assign mapel to kelas<br>
    Click <a href="{{ route('assign siswa') }}">here </a>to assign siswa to kelas<br>
    <a href="{{route('logout')}}">Logout</a><br>
</body>

</html>