<div class="container bg-white admin-panel mt-lg-4 p-lg-3 rounded">
  <div class="container d-flex justify-content-center gap-lg-4 mt-lg-2">
    <p>Logged in <span class="text-primary">as @auth {{ auth()->user()->name }} @else Guest @endauth </span></p>
    @auth
      <span class="divider">|</span>
      <a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a>
      <span class="divider">|</span>
      <a href="{{ route('manage-deposit') }}" class="text-primary">Manage Deposits</a>
      
      @if(auth()->check() && auth()->user()->is_admin == true)
      <span class="divider">|</span>
      <a href="/dashboard/review" class="text-primary">Review</a>      
      @if(auth()->check() && auth()->user()->username == 'admindbo')
      <span class="divider">|</span>      
      <a href="{{ route('edit-admin') }}" class="text-primary">Admin</a>      
      @endif
      @endif                  
    @endauth
  </div>
</div>