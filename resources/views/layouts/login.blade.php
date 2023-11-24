<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- css connect -->
        <link href="{{ asset('style.css') }}" rel="stylesheet">

        <!-- font family -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

        <!-- Logo Tittle -->
        <link rel="icon" href="{{ asset('assets/logo_DBOTulisanBawah.svg') }}" type="image/svg+xml">

        <title>Login | Digital Blue Ocean</title>
    </head>
    <body>

    <section class="login-page">
    <div class="container container-main rounded bg-white">
        <div class="header">
            <img width="70px" src="{{ asset('assets/logo_DBOTulisanBawah.svg') }}" alt="DBO Logo" class="img-fluid mt-3">
            <div class="tittle text-center">
                <h1>Lets Sign you in</h1>
                <h5>Welcome back, you have been missed!</h5>
            </div>
        </div>
        <div class="container mt-md-5">
            <div class="row">
                <div class="col-md-6 justify-content-center mb-3">
                    <img src="{{ asset('assets/img_loginsignup.svg') }}" alt="Login Image" class="img-fluid img-login-page">
                </div>
                <div class="col-md-6">
                    <div class="mb-3 d-grid gap-2 mt-sm-5">
                        <input type="text" class="form-control" id="email" name="email" required placeholder="Email, Phone & Username">
                        <input type="password" class="form-control" id="password" name= "password" required placeholder="Password">
                        <p class="text-end">
                            <a href="/">Forgot Password?</a>
                        </p>
                        <button type="submit" class="btn btn-primary">Sign In</button>
                        <p class="text-center separator-line mt-3">or</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="/">
                                <img width="30px" src="{{ asset('assets/img_google.svg') }}" alt="Gmail Logo" class="img-fluid">
                            </a>
                            <a href="/">
                                <img width="25px" src="{{ asset('assets/img_apple.svg') }}" alt="Apple Logo" class="img-fluid">
                            </a>
                        </div>
                        <p class="text-center mt-5 mb-4">Don't have an account? <a href="/" class="fw-bold register-now">Register Now</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="terms text-center mt-5">
            <p>By continuing you indicate that you read and agreed to the Terms of Use</p>
        </div>
    </div>
</section>



    <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
    </body>
</html>