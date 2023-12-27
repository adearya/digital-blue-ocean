{{-- Layout Dashboard --}}
@extends('layouts.dashboard')

{{-- Yield container-bg2 --}}
@section('container-bg2')

  {{-- Dashboard Contents --}}
  @include('partials.panel.search_panel')
  @include('partials.panel.user_panel')
  @include('partials.authorization.admin.update.item-submission-center')

@endsection