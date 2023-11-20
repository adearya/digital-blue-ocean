@extends('layouts.dashboard')

@section('container-bg2')

@include('partials.dashboard_contents.search_panel')
@include('partials.dashboard_contents.user_panel')
@include('partials.posts.all_posts')

@endsection