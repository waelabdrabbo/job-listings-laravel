@extends('layout')
@section('content')
    @include('partials._search')
    @include('partials._breadcrumb')
    <div class="row justify-content-center">
        <x-card class="col-4 text-center">
            <div class="card-header">
                {{ $listing['title'] }}
            </div>
            <img src="{{$listing->imageUrl ? asset('storage/' . $listing->imageUrl) : asset('/images/no-image.svg')}}" class="mx-auto d-block" alt="...">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="mailto:{{ $listing['email'] }}">{{ $listing['email'] }}</a></li>
                <li class="list-group-item"><a href="{{ $listing['website'] }}">{{ $listing['website'] }}</a></li>
                <x-listing-tags :tagsCsv="$listing->tags" />
                <li class="list-group-item">{{ $listing['location'] }}</li>
                <li class="list-group-item">{{ $listing['company'] }}</li>
            </ul>
        </x-card>
    </div>
@endsection
