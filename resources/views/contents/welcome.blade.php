<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>Login Page</title>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-custom navbar-expand-lg" style="background-color: #C2E8F9;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="images/logo sma.png" alt="" width="60"></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item navbar-custom navbar-brand">
                        <a class="nav-link active" aria-current="page" href="#"><b style="color: #0884CA;">SMANSA</b> <b style="color: #02659D;">PLUPUH</b></a>
                    </li>
                </ul>

                <div class="d-flex flex-row-reverse bd-highlight align-items-center">
                    <div class=" bd-highlight">
                        <a class="nav-link fs-5" aria-current="page" href="#">
                            <b class="p-1" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: #004267;">Masuk</b>
                            <img src="images/enter.png" alt="" width="35">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Modal Login -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('loginQuery')}}" method="POST">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            @csrf
                            <input type="email" id="defaultForm-email" class="form-control validate" name="email">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" id="defaultForm-pass" class="form-control validate" name="password">
                            <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="submit" value="Login" class="btn btn-default">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="text-center">
        <img src="images/cover welcome.png" class="img-fluid" alt="">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>