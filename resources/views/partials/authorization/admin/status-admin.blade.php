<section class="container admin-status mt-4 bg-white rounded p-3">
        <!-- Header Button -->
            <h1 class="container header-tittle pt-4 fw-bold text-center">Admin</h1>
            <div class="container header-button d-flex justify-content-center gap-2">
                <a href="" class="btn btn-warning text-white mt-4 col">Status</a>
                <a href="{{ route('edit-admin') }}" class="btn btn-warning text-white mt-4 col">Create User</a>
            </div>
        <!-- Akhir Header Button -->
        
        <!-- Backround Main Admin Status -->
        <div class="container bg-main-content mt-3 p-5">
            
        <!-- Status Info -->
        <div class="container status-user-items">
            <div class="status">
                <h1 class="text-center mb-4 fw-bold">Status of Users & Items</h1>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card text-center py-4 bg-light">
                            <h5 class="card-title">Editors</h5>
                            <p class="card-text display-4 fw-bold">{{ $totalEditors }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card text-center py-4 bg-light">
                            <h5 class="card-title">Administrators</h5>
                            <p class="card-text display-4 fw-bold">1</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card text-center py-4 bg-light">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text display-4 fw-bold">{{ $totalUsers }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 mb-sm-0">
                        <div class="card text-center py-4 bg-light">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text display-4 fw-bold">{{ $totalUsers }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-center py-4 bg-light">
                            <h5 class="card-title">Total Items</h5>
                            <p class="card-text display-4 fw-bold">{{ $totalItems }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <!-- Akhir Status Info -->
        </div>
<!-- background Main Akhir Admin Status -->
</section>
