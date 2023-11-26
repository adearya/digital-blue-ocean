<div class="container bg-white admin-panel mt-lg-4 p-lg-3 rounded">
  <div class="container d-flex justify-content-center gap-lg-4 mt-lg-2">
    <p>Logged in <span class="text-primary">as @auth {{ auth()->user()->name }} @else Guest @endauth </span></p>
    @auth
      <span class="divider">|</span>
      <a href="/manage-deposits" class="text-primary">Manage Deposits</a>
      <span class="divider">|</span>
      <a href="/profile" class="text-primary">Profile</a>
      <span class="divider">|</span>
      <a href="/review" class="text-primary">Review</a>
      <span class="divider">|</span>
      <a href="/admin" class="text-primary">Admin</a>
      <span class="divider">|</span>
      <form action="/logout" method="post" id="logoutForm">
        @csrf      
        <a href="#" class="text-primary" onclick="document.getElementById('logoutForm').submit();">Logout</a>
      </form>
    @endauth
  </div>
</div>