<div class="container detail-page mt-4 rounded bg-white">
  <div class="container pt-4 header-text">
    <h2 class="text-center fw-bold">{{ $post->title }}</h2>
    <p class="text-center">{{ $post->journal_or_publication_title }}, Vol {{ $post->volume }}. No {{ $post->number }}. ISSN {{ $post->issn }} ({{ $post->year }})</p>
    <h3>Abstract</h3>
    <p class="main-text">{{ $post->abstract }}</p>
  </div>
  <div class="container information-text mt-4">
    <p><span class="fw-bold">AUTHOR : </span>
      @foreach ($post->authors as $index => $item)              
        {{$item->firstName}} {{$item->lastName}}{{ $loop->last ? '' : ',' }}
      @endforeach
    </p>
    <p><span class="fw-bold">CATEGORY : </span>{{ $post->categories->name }}</p>
    <p><span class="fw-bold">KEYWORD : </span>
      @foreach ($post->keywords as $index => $item)
        {{$item->name}}{{ $loop->last ? '' : ',' }}
      @endforeach

    </p>
    <p><span class="fw-bold">VIEWS : </span>{{ $post->views_count }}</p>
    <p><span class="fw-bold">PUBLISHER : </span>{{ $post->publisher }}</p>
    <p><span class="fw-bold">PAGE RANGE : </span>{{ $post->from_page }}-{{ $post->to_page }}</p>
    <p><span class="fw-bold">DATE DEPOSITED : </span>{{ $post->day }} {{ $post->month }} {{ $post->year }}</p>
  </div>
  <div class="container mt-5 pb-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 text-center">
        <h3>
          @auth
            Link Download:
          @else
          Link Download: (<a href="/login">Login</a> )
          @endauth
        </h3>        
        <img src="{{ asset('assets/img_articlewriting.svg') }}" alt="img download article" width="80">        
          <p class="mb-0 ms-2">
            @auth                
            @if ($post->file_upload !== null)                  
              <a href="{{ route('download-file', ['filename' =>  $post->slug ] ) }}">Klik disini</a>            
            @else
              <a href="{{$post->link_file_upload}}">Klik disini</a>
            @endif
            @else
              Klik disini
            @endauth
          </p>
        
        <p class="text-center mt-2">Restricted to Registered users only - {{ $post->statuses->name }} Version <br>Official Url: <a href="{{ $post->official_url }}" class="text-break">{{ $post->official_url }}</a></p>
      </div>
    </div>
  </div>             
</div>