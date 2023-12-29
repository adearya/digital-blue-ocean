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
    <p><span class="fw-bold">PUBLISHER : </span>{{ $post->publisher }}</p>
    <p><span class="fw-bold">PAGE RANGE : </span>{{ $post->from_page }}-{{ $post->to_page }}</p>
    <p><span class="fw-bold">DATE DEPOSITED : </span>{{ $post->day }} {{ $post->month }} {{ $post->year }}</p>
  </div>
  <br>
</div>