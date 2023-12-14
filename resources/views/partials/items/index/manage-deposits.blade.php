<section class="container manage-deposits p-2 mt-4 bg-white rounded">
  <div class="text-center pt-4">
    <h1 class="tittle fw-bold">Manage Deposits</h1>
    <a href="{{ route('create-item-submission-center') }}" class="btn btn-warning text-white mt-4">NEW ITEM</a>
  </div>
  <div class="container bg-main-content mt-3 p-3">
    <div class="table-responsive">
      <table class="table table-spacing bg-white">
        <tr>
          <th class="text-center">Last Modified</th>
          <th class="text-center">Item Type</th>
          <th>Title</th>
          <th class="text-center">Journal or Publication Title</th>
          <th class="text-center">Author</th>
          <th class="text-center">Number</th>
          <th class="text-center">Volume</th>
          <th class="text-center"></th>
        </tr>
        @foreach ($collections as $post)
          <tr>
            <td class="text-center">26 September 2023</td>
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
                <a href="{{ route('manage-deposits.show', ['collection' => $post->slug]) }}">                
                  <img src="{{ asset('assets/img_viewItem.svg') }}" alt="View Item">
                </a>                
                <form action="/dashboard/manage-deposits/{{ $post->slug }}" method="post">                                    
                  @method('delete')
                  @csrf                  
                  <button type="submit">
                    <img src="{{ asset('assets/img_removeItem.svg') }}" alt="Remove Item">
                  </button>
                </form>
                <a href="{{ route('edit-item-submission-center', ['collection' => $post->slug ]) }}">
                  <img src="{{ asset('assets/img_editItem.svg') }}" alt="Edit Item">                
                </a>                                
              </div>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
  <div class="text-center p-3">
    <p>Displaying results 1 to 5 of 100. <br>
    1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10 | Next</p>
  </div>        
</section>