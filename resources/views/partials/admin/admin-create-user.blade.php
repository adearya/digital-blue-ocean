@extends("layouts.layout-dashboard")

@section("tittle", "Create User")

@section ("content")

        <section class="container admin-create-user mt-4 bg-white rounded p-3">
    <!-- Header Button -->
            <h1 class="container header-tittle pt-4 fw-bold text-center">Admin</h1>
            <div class="container header-button d-flex justify-content-center gap-2">
                <a href="/admin-status" class="btn btn-warning text-white mt-4 col">Status</a>
                <a href="/admin-create-user" class="btn btn-warning text-white mt-4 col">Create User</a>
                {{-- <a href="/admin-edit-keywords" class="btn btn-warning text-white mt-4 col">Edit Keywords</a> --}}
            </div>
    <!-- Akhir Header Button -->
    
    <!-- Backround Main Admin create user -->
        <div class="container bg-main-content mt-3 p-5">
        
    <!-- user type -->
        <div class="container create-user-type d-flex justify-content-center gap-3 mt-5">
            <h5 class="fw-bold">User Type :</h5>
            <div class="d-block">
                <div class="form-check">
                    <label class="form-check-label" for="usertype1">
                    <input class="form-check-input" type="radio" name="usertype" id="usertype1" value="option1" checked>
                        User
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="usertype2">
                    <input class="form-check-input" type="radio" name="usertype" id="usertype2" value="option2">
                        Editor
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="usertype3">
                    <input class="form-check-input" type="radio" name="usertype" id="usertype3" value="option3">
                        Repository Administrator
                    </label>
                </div>
            </div>
        </div>    
    <!-- Akhir user type -->

    {{-- username --}}
        <div class="container bg-main-username text-white mt-5 p-3 rounded">
            <h5 class="fw-bold">Username</h5>
            <div class="mt-3 d-flex flex-column align-items-center">
                <div class="w-50 mb-3">
                    <input type="text" class="form-control" id="usernameInput" placeholder="Create your username">
                </div>
            </div>
        </div>
    {{-- akhir username --}}

    {{-- account details --}}
        <div class="container bg-main-account-detail mt-5 text-white p-3 rounded">
            <h5 class="fw-bold">Account Detail</h5>
            <div class="mt-3 d-flex flex-column align-items-center">
                <div class="w-50 mb-3">
                    <h5>Email Address :</h5>
                    <input type="text" class="form-control" id="emailaddressInput" placeholder="Enter your email address">
                </div>
                <div class="w-50 mb-3">
                    <h5>Password :</h5>
                    <input type="password" class="form-control" id="passwordInput" placeholder="Create your password">
                </div>
            </div>
        </div>
    {{-- akhir account details --}}

    {{-- personal details --}}
        <div class="container bg-main-personal-details mt-5 text-white p-3 rounded">
            <h5 class="fw-bold">Personal Details</h5>
            <div class="mt-3 d-flex flex-column align-items-center">
                <div class="w-50 mb-3">
                    <h5>Name :</h5>
                <div class="row g-3">
                    <div class="col">
                        <input type="text" class="form-control" id="firstNameInput" placeholder="First Name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="lastNameInput" placeholder="Last Name">
                    </div>
                </div>
                </div>
                <div class="w-50 mb-3">
                    <h5>Department :</h5>
                    <input type="text" class="form-control" id="departmentInput" placeholder="Enter your department">
                </div>
                <div class="w-50 mb-3">
                    <h5>Organization :</h5>
                    <input type="text" class="form-control" id="organizationInput" placeholder="Enter your organization">
                </div>
                <div class="w-50 mb-3">
                    <h5>Address :</h5>
                    <input type="text" class="form-control" id="addressInput" placeholder="Enter your address">
                </div>
                <div class="w-50 mb-3">
                    <h5>Country :</h5>
                    <input type="text" class="form-control" id="countryInput" placeholder="Enter your country">
                </div>
            </div>
        </div>    
    {{-- akhir account details --}}

    {{-- action footer button --}}

    <div class="footer-button p-4 d-flex justify-content-center gap-3">
        <a href="/" class="btn btn-primary w-25 text-white">Cancel</a>
        <a href="/" class="btn btn-primary w-25 text-white">Finish Create</a>
    </div>

    {{-- akhir action footer button --}}


        </div>
    <!-- background Main Akhir admin create user -->
    </section>


@endsection