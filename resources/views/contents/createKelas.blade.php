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
    <div class="display-6 py-5 text-center">Form Kelas Baru</div>
    <form action="{{route('upload kelas')}}" method="POST">
        @csrf
        <label for="" class="form-text">Nama Kelas</label>
        <input type="text" name="nama" id="" class="form-control">
        <label for="" class="form-text">Tahun Ajaran</label>
        <input type="text" name="tahun_ajaran" id="" class="form-control">
        <input type="submit" value="Buat Kelas" class="btn btn-success mt-2">
    </form>
</body>
</html>
