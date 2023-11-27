@extends("layouts.layout-dashboard")

@section("tittle", "Users - Admin Digital Blue Ocean")

@section ("content")

        <section class="container profile-page mt-4 bg-white rounded p-3">
    <!-- Header Tittle -->
            <h5 class="header-tittle pt-4">Users - <span class="text-primary">Admin digital Blue Ocean</span></h5>
    <!-- Akhir Header Tittle -->
    
    <!-- Background Main Admin create user -->
        <div class="bg-main-content mt-3 p-5">
    <!-- Main Content - Account -->
            <div class="main-content-profile">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0">ACCOUNT PROFILE</h3>
                    <a href="/profile-edit-user" class="btn btn-dark text-white">Edit</a>
                </div>

                <div class="profile-detail">
                    <div class="mb-3">
                        <p class="mb-1">USERNAME:</p>
                        <p class="fw-bold">admin</p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1">USER TYPE:</p>
                        <p class="fw-bold">Repository Administrator</p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1">EMAIL ADDRESS:</p>
                        <p class="fw-bold">ahmadbayu@raharja.info</p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1">NAME:</p>
                        <p class="fw-bold">Admin Digital Blue Ocean</p>
                    </div>
                </div>
            </div>
    <!-- Akhir Main Content - Account -->
        </div>
    <!-- Akhir Background Main Admin create user -->
    
    <!-- background Main Akhir admin create user -->
    </section>


@endsection