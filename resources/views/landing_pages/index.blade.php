{{-- Layout Landing Page --}}
@extends('layouts.landing_page')

{{-- Yield container-bg1 --}}
@section('container-bg1')

  {{-- Landing Page Contents --}}
  @include('partials.landing_page_contents.home')
  @include('partials.landing_page_contents.search_collection')
  @include('partials.landing_page_contents.statistic')
  @include('partials.landing_page_contents.about')
  @include('partials.landing_page_contents.contact')
  @include('partials.landing_page_contents.related_links')

@endsection