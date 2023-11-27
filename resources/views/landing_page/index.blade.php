{{-- Layout Landing Page --}}
@extends('layouts.landing_page')

{{-- Yield container-bg1 --}}
@section('container-bg1')

  {{-- Landing Page Contents --}}
  @include('partials.landing_pages.home')
  @include('partials.landing_pages.search_collection')
  @include('partials.landing_pages.statistic')
  @include('partials.landing_pages.about')
  @include('partials.landing_pages.contact')
  @include('partials.landing_pages.related_links')

@endsection