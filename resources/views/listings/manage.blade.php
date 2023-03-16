@extends('layout')
@section('content')
    @unless(count($listings) == 0)
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listings as $listing)
                        <tr>
                            <th scope="row">{{ $listing->id }}</th>
                            <td>{{ $listing->title }}</td>
                            <td> <a href="/listings/{{ $listing->id }}/edit" class="btn btn-primary">Edit <i
                                        class="bi bi-pencil"></i>
                                </a>
                                <form style="display: inline-block;" method="POST" action="/listings/{{ $listing->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete <i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>no Listings Found</p>
        @endunless
    </div>
@endsection
