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
  @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td><a href="{{ route('get_collection', ['slug' => $category->slug]) }}">{{$category->title}}</a></td>
      <td>{{$category->author}}</td>
      <td>{{$category->category->name}}</td>
      <td>{{$category->file_upload}}</td>
    </tr>
  @endforeach  
  </tbody>
</table>

@endsection