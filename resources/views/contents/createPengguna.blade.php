<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="display-6 py-5 text-center">Form Pengguna Baru</div>
        <form action="{{ route('register pengguna') }}" method="post">
            @csrf
            <label for="" class="form-text">Nama Pengguna</label>
            <input type="text" name="nama" id="" class="form-control">
            <label for="" class="form-text">Email Pengguna</label>
            <input type="text" name="email" id="" class="form-control">
            <label for="" class="form-text">Password Pengguna</label>
            <input type="password" name="password" id="" class="form-control">
            <label for="" class="form-text">Role</label>
            <select name="role" id="" class="form-control">
                <option value="siswa">Siswa</option>
                <option value="guru">Guru</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" value="Daftar" class="btn btn-success mt-2 w-100">
        </form>
    </div>
</body>
</html>