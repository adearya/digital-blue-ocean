{{-- Layout Dashboard --}}
@extends('layouts.dashboard')

{{-- Yield container-bg2 --}}
@section('container-bg2')

  {{-- Dashboard Contents --}}
  @include('partials.panel.search_panel')
  @include('partials.panel.user_panel')
  @include('partials.posts.edit-item-submission-center')

@endsection