<section class="viewboard">
  <div class="container mt-5 mb-3 text-white fw-normal">
    Latest Collections
  </div>
  <div class="container bg-white p-2 content1 rounded">
    <div class="row">
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table table-spacing table-borderless">
            <tr>
              <th>Article Name</th>
              <th class="text-center">Views</th>
              <th class="text-center">Action</th>
            </tr>
            @foreach($posts as $post)
            <tr>
              <td>{{ $post->title }}</td>
              <td class="text-center">{{ $post->views_count }}</td>
              <td class="text-center"><a href="{{ route('detail', ['slug' => $post->slug]) }}">More Detail</a></td>
            </tr>
            @endforeach
            <tr>
              <td>
                <div class="explore-more">
                  <a class="me-3" href="{{ route('dashboard') }}">EXPLORE MORE</a>
                  <img src="assets/img/Vector.svg" alt="">
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        <div class="content1-right d-flex justify-content-center flex-wrap">
          <div class="kotak kotak1 d-flex justify-content-center gap-3">
              <img src="{{ asset('assets/img_totalitems.svg') }}" width="100" alt="Total Items">
              <div class="d-block justify-content-center mt-4 align-items-center">
                  <h3 class="fw-bold text-center">{{ $totalItems }}</h3>
                  <p class="fw-bold text-center">Items</p>
              </div>
          </div>
          <div class="kotak kotak2 d-flex justify-content-center gap-3">
              <img src="{{ asset('assets/img_totaldownloads.svg') }}" width="80" alt="Total Downloads">
              <div class="d-block justify-content-center mt-4 align-items-center">
                  <h3 class="fw-bold text-center">{{ $totalDownloads }}</h3>
                  <p class="fw-bold text-center">Downloads</p>
              </div>
          </div>
          <div class="kotak kotak3 d-flex justify-content-center gap-3">
              <img src="{{ asset('assets/img_fulltext.svg') }}" width="100" alt="Full Text">
              <div class="d-block justify-content-center mt-4 align-items-center">
                  <h3 class="fw-bold text-center">100%</h3>
                  <p class="fw-bold text-center">Full Text</p>
              </div>
          </div>
          <div class="kotak kotak4 d-flex justify-content-center">
              <img src="{{ asset('assets/img_openaccess.svg') }}" width="100" alt="Open Access">
              <div class="d-block justify-content-center mt-4 align-items-center">
                  <h3 class="fw-bold text-center">{{ $totalUsers }}</h3>
                  <p class="fw-bold text-center">Users</p>
              </div>
          </div>
      </div>
      </div>
    </div>
  </div>
  <div class="container mt-5 d-flex top-download-items-and-top-author text-white fw-normal">
    <div class="container top-download-items">
      Top Download Items
    </div>
    <div class="container top-author ms-4">
      Top Author
    </div>
  </div>
  <div class="container p-2 content2 rounded">
    <div class="row">
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table table-spacing bg-white rounded">
            <tr>
              <th>Search Terms</th>
              <th class="text-center">Downloaded</th>
            </tr>
            @foreach ($topDownloads as $item)                  
            <tr>
              <td>{{ $item->title }}</td>
              <td class="text-center">{{ $item->download_count }}</td>
            </tr>            
            @endforeach
          </table>
        </div>
      </div>
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table table-spacing bg-white rounded">
            <tr>
              <th>Search Terms</th>
              <th class="text-center">Downloaded</th>
            </tr>
            @foreach ($topUsers as $item)                  
            <tr>
              <td>{{ $item->name }}</td>
              <td class="text-center">{{ $item->download_count }}</td>
            </tr>            
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</section>