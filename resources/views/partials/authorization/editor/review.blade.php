<section class="container review-admin mt-4 p-2 bg-white rounded">
  <div class="container text-center">
          <h1 class="fw-bold">Review</h1>
  </div>

<!-- Help Accordion -->
  <div class="accordion mt-5" id="accordionHelp">
      <div class="accordion-item">
          <h2 class="accordion-header" id="headingHelp">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHelp" aria-expanded="true" aria-controls="collapseHelp">
                  Help
              </button>
          </h2>
          <div id="collapseHelp" class="accordion-collapse collapse" aria-labelledby="headingHelp" data-bs-parent="#accordionHelp">
              <div class="accordion-body">
                  <div class="row d-block">
                      <div class="col-12 col-md-4">
                          <div class="d-flex gap-3 mb-3">
                              <img src="{{ asset('assets/img_edititemreview.svg') }}" class="ms-5" alt="image edit item review">
                              <p class="mt-3">View item in detail, including edit item</p>
                          </div>
                      </div>
                      <div class="col-12 col-md-4">
                          <div class="d-flex gap-3 mb-3">
                              <img src="{{ asset('assets/img_publishitemreview.svg') }}" class="ms-5" alt="image publish item review">
                              <p class="mt-3">Move Item to Repository</p>
                          </div>
                      </div>
                      <div class="col-12 col-md-4">
                          <div class="d-flex gap-3">
                              <img src="{{ asset('assets/img_deleteitemreview.svg') }}" class="ms-5" alt="image delete item review">
                              <p class="mt-3">Destroy Item (with notification to depositing user)</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
<!-- akhir Help Accordion -->

{{-- main content dashboard --}}
<div class="container bg-main-content mt-3 p-3">
  <div class="table-responsive">
          <table class="table table-spacing bg-white">
          <tr>
              <th class="text-center">Last Modified</th>
              <th class="text-center">Item Type</th>
              <th>Tittle</th>
              <th class="text-center">Depositing User</th>
              <th class="text-center">Journal or Publication Title</th>
              <th class="text-center">Volume</th>
              <th class="text-center">Number</th>
              <th class="text-center"></th>
          </tr>

          @foreach ($collections as $post)
          <tr>
              <td class="text-center">{{ $post->updated_at->format('d F Y') }}</td>
            <td class="text-center">{{ $post->item_types->name }}</td>
            <td>{{ $post->title }}</td>
            <td class="text-center">{{ $post->journal_or_publication_title }}</td>
            <td class="text-center">
              @foreach ($post->authors as $item)
              {{$item->firstName}}{{$item->lastName}} 
              @endforeach
            </td>    
            <td class="text-center">{{ $post->number }}</td>
            <td class="text-center">{{ $post->volume }}</td>
              <td class="text-center bg-white">
                  <div class="d-flex gap-2">
                      <a href="{{ route('edit-item-submission-center', ['deposit' => $post->slug ]) }}">
                          <img src="{{ asset('assets/img_edititemreview.svg') }}" alt="Edit Item">
                      </a>
                      <form action="{{ route('publish', ['slug' => $post->slug]) }}" method="post">
                        @csrf
                        <button type="submit" style="border: none; background-color: transparent">
                            <img src="{{ asset('assets/img_publishitemreview.svg') }}" alt="Publish Item">
                        </button>
                      </form>
                      <form action="/dashboard/manage-deposit/{{ $post->slug }}" method="post">                                    
                        @method('delete')
                        @csrf                  
                        <button type="submit"  style="border: none; background-color: transparent">
                          <img src="{{ asset('assets/img_deleteitemreview.svg') }}" alt="Delete Item">                        
                        </button>
                      </form>                      
                  </div>
              </td>
          </tr>                                                         
          @endforeach
          </table>
      </div>
    </div>
    <div class="text-center p-3">
    @if ($collections->isNotEmpty())            
        <p>Displaying results {{ $collections->firstItem() }} to {{ $collections->lastItem() }} of {{ $collections->total() }}</p>
        <p>{{ $collections->links() }}</p>
      @else
        <p>Displaying results is empty</p>  
      @endif
    </div>
{{-- akhir main content dashboard --}}

</section>