<h1>{{$title}}</h1>

<table class="table table-bordered table-lg border-primary">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">File</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Subject</th>
    </tr>
  </thead>
  
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $posts->firstItem() + $loop->index  }}</th>
      <td>{{$post->file_upload}}</td>
      <td><a href="{{ route('single_post', ['slug' => $post->slug]) }}">{{$post->title}}</a></td>
      <td><a href="/author/{{ $post->author->username }}">{{$post->author->name}}</a></td>
      <td><a href="/category/{{ $post->category->slug }}">{{$post->category->name}}</a></td>
    </tr>
    @endforeach
  </tbody>

</table>

<div class="text-center p-3">
<p><p>Displaying results {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }}</p><br>{{ $posts->links() }}</p>
</div>


