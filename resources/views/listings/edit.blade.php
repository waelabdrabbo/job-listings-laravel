@extends('layout')
@section('content')
    <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="company" class="form-label">Company Name</label>
            <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" id="company"
                value="{{ $listing->company }}">
            @error('company')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                value="{{ $listing->title }}">
            @error('title')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Job Location</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                id="location" value="{{ $listing->location }}">
            @error('location')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="url" class="form-control @error('website') is-invalid @enderror" name="website" id="website"
                value="{{ $listing->website }}">
            @error('website')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"> Company Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                value="{{ $listing->email }}">
            @error('email')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags (Comma Separated)</label>
            <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" id="tags"
                value="{{ $listing->tags }}">
            @error('tags')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="mb3">
            <label for="inputGroupFile02" class="form-label">Company Logo</label>
            <div class="input-group">
                <input type="file" class="form-control @error('imageUrl') is-invalid @enderror" id="inputGroupFile02"
                    name="imageUrl">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                @error('imageUrl')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <img style="width:360px" src="{{ $listing->imageUrl ? asset('storage/' . $listing->imageUrl) : asset('/images/no-image.svg') }}"
            class=" d-block" alt="...">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Job Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="validationTextarea" name="description"
                id="description">{{ $listing->description }}</textarea>
            @error('description')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
