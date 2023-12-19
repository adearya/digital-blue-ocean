<section class="container profile-edit-user mt-4 bg-white rounded p-3">
    <form action="{{ route('update-profile', ['username' => auth()->user()->username ]) }}" method="post" id="update-profile">
      @method('put')
      @csrf
    <!-- Header Button -->
            <h1 class="container header-tittle pt-4 fw-bold">Edit</h1>
    <!-- Akhir Header Button -->
    
    <!-- Backround Main Admin create user -->
        <div class="container bg-main-content mt-3 p-5">
        
    {{-- account details --}}
        <div class="container bg-main-account-detail mt-5 text-white p-3 rounded">
            <h5 class="fw-bold">Account Detail</h5>
            <div class="mt-3 d-flex flex-column align-items-center">
              <div class="w-50 mb-3">
                <h5>Name :</h5>
                <input type="text" class="form-control" name="name" value="{{ old('name', $items->name) }}">
              </div>
              <div class="w-50 mb-3">
                <h5>Username :</h5>
                <input type="text" class="form-control" value="{{ old('username', $items->username) }}">
            </div>
                <div class="w-50 mb-3">
                    <h5>Email Address :</h5>
                    <input type="text" class="form-control" id="emailaddressInput" value="{{ old('email', $items->email) }}">
                </div>
            <div>
                <label for="passwordInput">Update Password:</label>
                <input type="checkbox" name="update_password">
    
                <div id="passwordSection" style="display: none;">
                    <label for="newPasswordInput">New Password:</label>
                    <input type="password" class="form-control" id="newPasswordInput" name="password">
                </div>
            </div>
        </div>
        <script>
          // Add a script to show/hide the password field based on the checkbox
          document.querySelector('[name="update_password"]').addEventListener('change', function () {
              document.getElementById('passwordSection').style.display = this.checked ? 'block' : 'none';
          });
      </script>
    {{-- akhir account details --}}

    {{-- action footer button --}}
    <div class="footer-button p-4 d-flex justify-content-center gap-3">
        <a href="#" class="btn btn-primary w-25 text-white">Cancel</a>
        <a href="#" class="btn btn-primary w-25 text-white" onclick="document.getElementById('update-profile').submit();">Save</a>
    </div>
    {{-- akhir action footer button --}}
  </div>
  <!-- background Main Akhir admin create user -->
</form>
</section>