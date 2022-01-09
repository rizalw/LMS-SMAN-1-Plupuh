<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="container">
    <div class="display-6 py-5 text-center">Form Mata Pelajaran Baru</div>
    <a href="/home">
        <button class="btn btn-primary">
            < Kembali</button>
    </a>
    <form action="{{ route('upload mapel') }}" method="post">
        @csrf
        <label for="" class="form-text">Nama Mapel</label>
        <input type="text" name="nama_mapel" class="form-control" required>
        <label for="" class="form-text">Nama Guru</label>
        <select name="nama_guru" id="" class="form-control" required>
            @foreach($guru as $g)
            <option value="{{ $g->email }}">{{ $g->Nama }}</option>
            @endforeach
        </select><br>
        <label for="" class="form-text">Deskripsi Mata Pelajaran</label><br>
        <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" required></textarea><br>
        <input type="submit" value="Register Mata Pelajaran" class="btn btn-success">
    </form>
</body>

</html>