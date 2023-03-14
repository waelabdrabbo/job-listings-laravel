@extends('layout')
@section('content')
@include('partials._hero')
@include('partials._search')
    @unless(count($listings) == 0)
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($listings as $listing)
            <x-listing-card :listing="$listing"/>
            @endforeach
        @else
            <p>no Listings Found</p>
        </div>
    @endunless
@endsection
