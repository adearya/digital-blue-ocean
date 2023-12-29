<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('assets/logo_DBOTulisanKanan.svg') }}" alt="Logo DBO" width="150">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav ms-auto mb-2 mt-2">
        <li class="nav-item mx-2">
          <a class="nav-link active text-white fw-bold" aria-current="page" href="/#home">Home</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link active text-white fw-bold" aria-current="page" href="/search-collections">Search Collections</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link active text-white fw-bold" aria-current="page" href="/statistics">Statistics</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link active text-white fw-bold" aria-current="page" href="/#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white fw-bold mx-2" aria-current="page" href="/contact-us">Contact</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link active text-white fw-bold" aria-current="page" href="/related-links">Related Links</a>
        </li>
      </ul>
      @guest
        <a class="btn btn-outline-info d-flex mx-2" aria-current="page" href="/login">Log in</a>
      @else
      {{-- <form action="/logout" method="post" id="logoutForm">
        @csrf      
        <a class="btn btn-outline-info d-flex mx-2" aria-current="page" href="#" onclick="document.getElementById('logoutForm').submit();">Log out</a>        
      </form> --}}
      <div class="dropdown mx-2">
        <button class="btn btn-outline-info btn-light" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li><a href="{{ route('index-profile') }}" class="dropdown-item">Profile</a></li>
            <form action="/logout" method="post" id="logoutForm">
                @csrf
                <li><a class="dropdown-item" href="#" onclick="document.getElementById('logoutForm').submit();">Log out</a></li>
            </form>
        </ul>
    </div>
      @endguest
    </div>
  </div>
</nav>