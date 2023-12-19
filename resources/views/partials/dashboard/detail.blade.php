<div class="container detail-page mt-4 rounded bg-white">
  <div class="container pt-4 header-text">
    <h2 class="text-center fw-bold">{{ $post->title }}</h2>
    <p class="text-center mt-3"><br>{{ $post->journal_or_publication_title }}, Vol {{ $post->volume }}. No {{ $post->number }}. ISSN {{ $post->issn }} ({{ $post->year }})</p>
    <h3>Abstract</h3>
    <p class="main-text">{{ $post->abstract }}</p>
  </div>
  <div class="container information-text mt-4">
    <p><span class="fw-bold">CATEGORY : </span>{{ $post->categories->name }}</p>
    <p><span class="fw-bold">KEYWORD : </span>
      @foreach ($post->authors as $item)              
        {{$item->firstName}} {{$item->lastName}} 
      @endforeach
    </p>
    <p><span class="fw-bold">VIEWS : </span>{{ $post->views_count }}</p>
    <p><span class="fw-bold">DEPOSITING USER : </span>{{ $post->publisher }}</p>
    <p><span class="fw-bold">DATE DEPOSITED : </span>{{ $post->day }} {{ $post->month }} {{ $post->year }}</p>
  </div>
  <div class="container mt-5 pb-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <h3 class="text-center">
          @auth
            Login as {{ auth()->user()->name }}
          @else
            Login Required (<a href="/login">Login</a> )
          @endauth
        </h3>
        <div class="d-flex justify-content-center align-items-center">
          <img src="{{ asset('assets/img_articlewriting.svg') }}" alt="img download article" width="80">
          <p class="mb-0 ms-2">
            @auth                
              <a href="{{ route('download-file', ['filename' =>  $post->slug ] ) }}">Link Download</a>            
            @else
              Link Download
            @endauth
          </p>
        </div>
        <p class="text-center mt-2">Restricted to Registered users only - Published Version <br>Official Url: <a href="https://att.aptisi.or.id/index.php/att/article/view/313" class="text-break">https://att.aptisi.or.id/index.php/att/article/view/313</a></p>
      </div>
    </div>
  </div>             
</div>