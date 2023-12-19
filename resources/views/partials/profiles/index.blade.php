<section class="container profile-page mt-4 bg-white rounded p-3">
    <!-- Header Tittle -->
            <h5 class="header-tittle pt-4">Users - <span class="text-primary">{{ auth()->user()->name}}</span></h5>
    <!-- Akhir Header Tittle -->
    
    <!-- Background Main Admin create user -->
        <div class="bg-main-content mt-3 p-5">
    <!-- Main Content - Account -->
            <div class="main-content-profile">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0">ACCOUNT PROFILE</h3>
                    <a href="{{ route('edit-profile', ['username' => auth()->user()->username]) }}" class="btn btn-dark text-white">Edit</a>
                </div>

                <div class="profile-detail">
                  <div class="mb-3">
                      <p class="mb-1">NAME:</p>
                      <p class="fw-bold">{{ auth()->user()->name }}</p>
                  </div>
                  <div class="mb-3">
                        <p class="mb-1">USERNAME:</p>
                        <p class="fw-bold">{{ auth()->user()->username }}</p>
                      </div>
                      <div class="mb-3">
                          <p class="mb-1">EMAIL ADDRESS:</p>
                          <p class="fw-bold">{{ auth()->user()->email}}</p>
                      </div>
                    <div class="mb-3">
                        <p class="mb-1">USER Authorization:</p>
                        <p class="fw-bold">
                          @if ( auth()->user()->is_admin == 1)
                            Admin
                          @else
                            User
                          @endif
                        </p>
                    </div>
                </div>
            </div>
    <!-- Akhir Main Content - Account -->
        </div>
    <!-- Akhir Background Main Admin create user -->
    
    <!-- background Main Akhir admin create user -->
    </section>