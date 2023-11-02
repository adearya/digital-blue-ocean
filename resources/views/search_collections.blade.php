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
    </tr>
  </thead>
  <tbody>

  @foreach($collections as $each_collections)
    <tr>
      <th scope="row">{{$each_collections->id}}</th>
      <td>{{$each_collections->title}}</td>
      <td>{{$each_collections->author}}</td>
      <td>{{$each_collections->subject}}</td>
    </tr>
  @endforeach  
    
  </tbody>
</table>

@endsection