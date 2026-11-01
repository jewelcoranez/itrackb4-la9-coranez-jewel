
@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
<div class="container mt-4">
    <h2>Add New Book</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title"
                   class="form-control" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Author</label>
            <select name="author_id" id="author_id" class="form-select">
                <option value="">Select Author</option>

                @foreach ($authors as $item)
                    <option value="{{ $item->id }}"
                        {{ old('author_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
            @error('author_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pages" class="form-label">Pages</label>
            <input type="number" name="pages" id="pages"
                   class="form-control" value="{{ old('pages') }}" min="1">
            @error('pages')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="is_available" class="form-label">Availability</label>
            <select name="is_available" id="is_available" class="form-select">
                <option value="">Select Availability</option>
                <option value="1" {{ old('is_available') == '1' ? 'selected' : '' }}>Available</option>
                <option value="0" {{ old('is_available') == '0' ? 'selected' : '' }}>Not Available</option>
            </select>
            @error('is_available')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
