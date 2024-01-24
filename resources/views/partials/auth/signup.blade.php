<div class="container container-main rounded bg-white">
    <div class="header">
        <img width="70px" src="{{ asset('assets/logo_DBOTulisanBawah.svg') }}" alt="DBO Logo" class="img-fluid mt-3">
        <div class="tittle text-center">
            <h1>Lets Register Account</h1>
            <h5>Hello user, you have a greatful journey!</h5>
        </div>
    </div>
    <div class="container mt-md-5">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 d-grid gap-2 mt-sm-5">
                    <form action="/signup" method="post">
                        @csrf
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Name">
                        <input type="text" class="form-control" id="email" name="email" required placeholder="Email">
                        <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                        <button type="submit" class="btn btn-primary">Sign Up</button>    
                    </form>
                    <p class="text-center separator-line mt-3">or</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="/auth/google">
                            <img width="30px" src="{{ asset('assets/img_google.svg') }}" alt="Gmail Logo" class="img-fluid">
                        </a>
                        <a href="/">
                            <img width="25px" src="{{ asset('assets/img_apple.svg') }}" alt="Apple Logo" class="img-fluid">
                        </a>
                    </div>
                    <p class="text-center mt-5 mb-4">Already  have an account? <a href="/" class="fw-bold register-now">Login</a></p>
                </div>
            </div>
            <div class="col-md-6 justify-content-center">
                <img src="{{ asset('assets/img_loginsignup.svg') }}" alt="Login Image" class="img-fluid img-login-page">
            </div>
        </div>
    </div>
    <div class="terms text-center mt-5">
        <p>By continuing you indicate that you read and agreed to the Terms of Use</p>
    </div>
</div>