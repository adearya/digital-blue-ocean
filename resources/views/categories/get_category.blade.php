@extends('layouts.main')

@section('container')
<h1>{{$title}}</h1>

<table class="table table-bordered table-lg border-primary">
  <thead>
    <tr>
      <th scope="col">Subject</th>
    </tr>
  </thead>
  
  <tbody>
  @foreach($categories as $category)
    <tr>
      <td><a href="/category/{{$category->slug}}">{{$category->name}}</a></td>
    </tr>
  @endforeach  
  </tbody>
</table>

@endsection