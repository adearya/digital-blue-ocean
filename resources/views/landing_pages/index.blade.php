@extends('layouts.landing_page')

@section('container-bg1')

@include('partials.landing_page_contents.home')
@include('partials.landing_page_contents.search_collection')
@include('partials.landing_page_contents.statistic')
@include('partials.landing_page_contents.about')
@include('partials.landing_page_contents.contact')
@include('partials.landing_page_contents.related_links')

@endsection