{{-- Layout Dashboard --}}
@extends('layouts.dashboard')

{{-- Yield container-bg2 --}}
@section('container-bg2')

  {{-- Dashboard Contents --}}
  @include('partials.panel.user_panel')
  @include('partials.authorization.admin.edit-admin')

@endsection