
@extends('layouts.app')

@section('title', 'Add Book')

@section('content')

<div class="container mt-4">

    <h2>Add New Book</h2>

    <form action="{{ route('books.store') }}" method="POST">

        @csrf

       
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>

            <input
                type="text"
                name="title"
                id="title"
                class="form-control"
                value="{{ old('title') }}"
            >

            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

     
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>

            <input
                type="text"
                name="author"
                id="author"
                class="form-control"
                value="{{ old('author') }}"
            >

            @error('author')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>

            <input
                type="text"
                name="genre"
                id="genre"
                class="form-control"
                value="{{ old('genre') }}"
             
            >

            @error('genre')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>

            <input
                type="number"
                name="rating"
                id="rating"
                class="form-control"
                value="{{ old('rating') }}"
                min="0"
                max="10"
                step="0.1"
            >

            @error('rating')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Add Book
        </button>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection

