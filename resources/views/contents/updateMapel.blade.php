<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Mapel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="display-6 py-5 text-center">Update Mapel</div>
        <a href="/home">
            <button class="btn btn-primary">
                < Kembali</button>
        </a>
        <form action="{{ route('update mapel final') }}" method="post">
            @csrf
            <input type="number" value="{{ $mapel->id }}" name="id" hidden>
            <label for="" class="form-text">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" class="form-control"  value="{{ $mapel->nama }}" required>
            <label for="" class="form-text">Deskripsi Mata Pelajaran</label><br>
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" required>{{ $mapel->deskripsi}}</textarea><br>
            <input type="submit" value="Update Mata Pelajaran" class="btn btn-success">
        </form>
    </div>
</body>

</html>