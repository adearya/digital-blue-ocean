<section class="container dashboard-admin mt-4 p-2 bg-white rounded">
  {{-- header button --}}
  <div class="bg-header">
    <div class="container d-flex flex-column justify-content-center mt-2 p-2 gap-3">
      <div class="row justify-content-center">
        <div class="col-sm-4 d-flex align-items-center justify-content-center mb-3">
          <div class="article-content d-flex gap-2">
            <h5 class="fw-bold">Article</h5>
            <a href="/" class="btn btn-warning btn-sm text-white">{{ $articleCount }} Data</a>
          </div>
        </div>
        <div class="col-sm-4 d-flex align-items-center justify-content-center mb-3">
          <div class="books-content d-flex gap-2">
            <h5 class="fw-bold">Books</h5>
            <a href="/" class="btn btn-warning btn-sm text-white">{{ $bookCount }} Data</a>
          </div>
        </div>
        <div class="col-sm-4 d-flex align-items-center justify-content-center mb-3">
          <div class="thesis-content d-flex gap-2">
            <h5 class="fw-bold">Thesis</h5>
            <a href="/" class="btn btn-warning btn-sm text-white">{{ $thesisCount }} Data</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- header title --}}
  <div class="container mt-3 p-2">
    <h3 class="fw-bold text-center">ALL COLLECTIONS</h3>
  </div>

  {{-- collection menu --}}
  <div class="container d-flex justify-content-between">
    <div class="ms-auto order-by-results me-4 d-flex gap-3">
      <form id="sortForm" action="/dashboard" method="GET">
        <label for="sort">Order by results:</label>
        <select name="sort" id="sort" onchange="submitForm()" class="bg-primary text-white p-1">
            <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>recent</option>
            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>oldest</option>
        </select>
      </form>
    </div>
</div>

      
  {{-- <script>
    function changeOrder(selectedOrder) {
      document.getElementById('orderByDropdown').textContent = selectedOrder;
    }
  </script>     --}}

  {{-- <form id="sortForm" action="{{ url('/posts') }}" method="GET">
    <label for="sort">Order by results:</label>
    <select name="sort" id="sort" onchange="submitForm()">
        <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>Recent</option>
        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
    </select>
</form> --}}

<script>
  function submitForm() {
      document.getElementById('sortForm').submit();
  }
</script>

  {{-- main content dashboard --}}
  <div class="container bg-main-content mt-3 p-3">
    <div class="table-responsive">
      <table class="table table-spacing bg-white">
        <tr>
          <th class="text-center">NO.</th>
          <th class="text-center">Cover</th>
          <th>Title</th>
          <th class="text-center">Author</th>
          <th class="text-center">Keyword</th>
          @if (auth()->check() && auth()->user()->is_admin == true)
            <th class="text-center"></th>
          @endif
        </tr>
        @foreach($posts as $post)
          <tr>                        
            <td class="text-center">{{ $posts->firstItem() + $loop->index  }}</td>
            <td class="text-center">
              @if ($post->image !== null)
                <img src="{{ asset('storage/images/' . basename($post->image)) }}" alt="Logo DBO" width="80">
              @else                  
                <img src="{{ asset('assets/default_cover.png') }}" alt="Logo DBO" width="80">
              @endif
            </td>
            <td><a href="{{ route('detail', ['slug' => $post->slug]) }}">{{$post->title}}</a></td>
            {{-- <td class="text-center text-nowrap"><a href="/author/{{ $post->author->username }}">{{$post->author->name}}</a></td> --}}
            {{-- <td class="text-center"><a href="/category/{{ $post->category->slug }}">{{$post->category->name}}</a></td> --}}
            <td class="text-center">
              @foreach ($post->authors as $item)              
              {{$item->firstName}} {{$item->lastName}}<br>
              @endforeach
            </td>
            <td class="text-center">
              @foreach ($post->keywords as $item)         
                {{$item->name}}<br>
              @endforeach
            </td>
            @if (auth()->check() && auth()->user()->is_admin == true)
            <td class="text-center bg-white">
              <div class="d-flex gap-2">                                
                <form action="/dashboard/{{ $post->slug }}" method="post">                                    
                  @method('delete')
                  @csrf                  
                  <button type="submit"  style="border: none; background-color: transparent">
                    <img src="{{ asset('assets/img_removeItem.svg') }}" alt="Remove Item">
                  </button>
                </form>
                <a href="{{ route('edit-item-submission-center-dashboard', ['deposit' => $post->slug ]) }}">
                  <img src="{{ asset('assets/img_editItem.svg') }}" alt="Edit Item">                
                </a>                                
              </div>
            </td>
            @endif
          </tr>
        @endforeach
      </table>

      <div class="text-center p-3">
        @if ($posts->isNotEmpty())            
          <p>Displaying results {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }}</p>
          <p>{{ $posts->links() }}</p>
        @else
          <p>Displaying results is empty</p>  
        @endif
      </div>
    </div>
  </div>
</section>