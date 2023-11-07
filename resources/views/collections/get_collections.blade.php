@extends('layouts.main')

@section('container')
<h1>{{$title}}</h1>

<table class="table table-bordered table-lg border-primary">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Subject</th>
      <th scope="col">File</th>
    </tr>
  </thead>
  
  <tbody>
  @foreach($collections as $collection)
    <tr>
      <th scope="row">{{$collection->id}}</th>
      <td><a href="{{ route('get_collection', ['slug' => $collection->slug]) }}">{{$collection->title}}</a></td>
      <td>{{$collection->author}}</td>
      <td>{{$collection->category->name}}</td>
      <td>{{$collection->file_upload}}</td>
    </tr>
  @endforeach  
  </tbody>
</table>

@endsection