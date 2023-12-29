<section class="container admin-create-user mt-4 bg-white rounded p-3">
  <form action="{{ route('update-admin') }}" method="post" id="update-admin">
    @csrf
    <!-- Header Button -->
            <h1 class="container header-tittle pt-4 fw-bold text-center">Admin</h1>
            <div class="container header-button d-flex justify-content-center gap-2">
                <a href="{{ route('status-admin') }}" class="btn btn-warning text-white mt-4 col">Status</a>
                <a href="#" class="btn btn-warning text-white mt-4 col">Edit Authorization</a>              
            </div>
    <!-- Akhir Header Button -->
    
    <!-- Backround Main Admin create user -->
        <div class="container bg-main-content mt-3 p-5">
        
    <!-- user type -->
        <div class="container create-user-type justify-content-center gap-3 mt-5">
            <h5 class="fw-bold">User Authorization :</h5>
            <div class="d-block">
                <div class="form-check">
                  @foreach ($items as $item)
        <label class="form-check-label" for="">
            <input
                class="form-check-input"
                type="checkbox"
                name="items[{{ $item->id }}]"
                {{ old('items.' . $item->id, $item->is_admin) ? 'checked' : '' }}
            >{{ $item->name }}
        </label>
        <br>
    @endforeach
                </div>               
            </div>
        </div>    
    <!-- Akhir user type -->      

    {{-- action footer button --}}

    <div class="footer-button p-4 d-flex justify-content-center gap-3">
        <a href="#" class="btn btn-primary w-25 text-white">Cancel</a>                  
        <a href="#" class="btn btn-primary w-25 text-white" onclick="document.getElementById('update-admin').submit();">Update</a>        
    </div>

      {{-- akhir action footer button --}}
      </div>
    <!-- background Main Akhir admin create user -->
  </form>
</section>