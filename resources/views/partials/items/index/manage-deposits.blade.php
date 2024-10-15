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
    @if ($post->user_upload == auth()->user()->email)
        <tr>
            <td class="text-center">{{ $post->updated_at->format('d F Y') }}</td>
            <td class="text-center">{{ $post->item_types->name }}</td>
            <td>{{ $post->title }}</td>
            <td class="text-center">{{ $post->journal_or_publication_title }}</td>
            <td class="text-center" style="white-space: nowrap">
                @foreach ($post->authors as $item)
                    {{$item->firstName}} {{$item->lastName}} <br>
                @endforeach
            </td>    
            <td class="text-center">{{ $post->number }}</td>
            <td class="text-center">{{ $post->volume }}</td>
            <td class="text-center bg-white">
                <div class="d-flex gap-2">
                    <a href="{{ route('detail-deposit', ['slug' => $post->slug]) }}">
                        <img src="{{ asset('assets/img_viewItem.svg') }}" alt="View Item">
                    </a>                
                    <form action="/dashboard/manage-deposit/{{ $post->slug }}" method="post">                                    
                        @method('delete')
                        @csrf                               
                        <button type="submit"  style="border: none; background-color: transparent">
                            <img src="{{ asset('assets/img_removeItem.svg') }}" alt="Remove Item">
                        </button>
                    </form>
                    <a href="{{ route('edit-item-submission-center', ['deposit' => $post->slug ]) }}">
                        <img src="{{ asset('assets/img_editItem.svg') }}" alt="Edit Item">                
                    </a>                                
                </div>
            </td>
        </tr>
    @endif
@endforeach

      </table>
    </div>
  </div>
  <div class="text-center p-3">
    @if ($posts_count->isNotEmpty())
      <p>Displaying results {{ $posts_count->firstItem() }} to {{ $posts_count->lastItem() }} of {{ $posts_count->total() }}</p>
      <p>{{ $posts_count->links() }}</p>
    @else        
      <p>Displaying results is empty</p>
    @endif
  </div>        
</section>