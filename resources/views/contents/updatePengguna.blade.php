<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="display-6 py-5 text-center">Update Pengguna</div>
        <a href="/home">
            <button class="btn btn-primary">< Kembali</button>
        </a>
        <form action="{{ route('update pengguna final') }}" method="post">
            @csrf
            <input type="number" name="id" id="" value="{{ $pengguna->id }}" hidden>
            <label for="" class="form-text">Nama Pengguna</label>
            <input type="text" name="nama" id="" class="form-control" value="{{ $pengguna->Nama }}" required>
            <label for="" class="form-text">Email Pengguna</label>
            <input type="text" name="email" id="" class="form-control" value="{{ $pengguna->email }}" required>
            <label for="" class="form-text">Password Pengguna</label>
            <input type="password" name="password" id="" class="form-control" value="{{ $pengguna->password }}" required>
            <label for="" class="form-text">Role</label>
            <select name="role" id="" class="form-control" required>
                <?php 
                $role = $pengguna->role;
                ?>
                <option value="siswa" <?= ($role == "siswa") ? 'selected' : ""; ?>>Siswa</option>
                <option value="guru" <?= ($role == "guru") ? 'selected' : ""; ?>>Guru</option>
                <option value="admin" <?= ($role == "admin") ? 'selected' : ""; ?>>Admin</option>
            </select>
            <input type="submit" value="Daftar" class="btn btn-success mt-2 w-100">
        </form>
    </div>
</body>
</html>