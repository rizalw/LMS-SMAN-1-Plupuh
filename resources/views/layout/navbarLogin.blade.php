<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    @yield("title")

</head>

<body style="background-color: #C2E8F9;">

    <!-- Navbar -->
    <nav class="navbar navbar-custom navbar-expand-lg shadow" style="background-color: #C2E8F9;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo sma.png') }}" alt="" width="60"></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item navbar-custom navbar-brand">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><b style="color: #0884CA;">SMANSA</b> <b
                                style="color: #02659D;">PLUPUH</b></a>
                    </li>
                </ul>

                <div class="d-flex flex-row-reverse bd-highlight align-items-center">
                    <div class=" bd-highlight">
                        <a class="nav-link d-flex fs-5 align-self-center" aria-current="page" href="{{ route('profile') }}">
                            <b class="p-1 mx-2" style="color: #004267;">Hi, {{ session('nama') }}</b>
                            <i class="fas fa-user" id="" style="color: #004267; font-size: 35px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('main')
    <!-- Footer -->
    <footer style="background-color: #004267;" class="sticky-bottom mt-5">
        <div class="row">

            <div class="col-5">
                <div class="d-flex flex-column bd-highlight mb-3" style="color: white !important;">
                    <div class="bd-highlight">Contact Us:</div>

                    <div class="bd-highlight">
                        <p>Jalan Sambirejo - Plupuh, Sragen Desa Sambirejo, Kecamatan Plupuh, Kabupaten Sragen, Jawa Tengah, 57283 </p>
                    </div>

                    <div class="bd-highlight">
                        <p><i class="far fa-envelope"></i> smansaplupuh@gmail.com</p>
                    </div>

                    <div class="bd-highlight">
                        <p><i class="fas fa-phone-alt"></i> 02718854315</p>
                    </div>
                </div>
            </div>

            <div class="col-2 d-flex align-items-center">
                <img src="{{ asset('images/logo sekolah.png') }}" alt="" class="mx-auto d-block" width="110">
            </div>

            <div class="col-5">
                <ul class="nav col-md-10 justify-content-end" style="color: white !important;">
                    <div class="p-2 bd-highlight">Follow Us:</div>
                    <div class="p-2 bd-highlight">
                        <i class="fab fa-instagram" style="font-size: 30px;"></i>
                        <i class="fab fa-facebook-square" style="font-size: 30px;"></i>
                    </div>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>