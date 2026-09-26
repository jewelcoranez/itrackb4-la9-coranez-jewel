@extends('layouts.app')

@section('title', 'Books')

@section('content')

    <h2 class="mt-4">BOOK LIST</h2>

    
    <div class="alert alert-info">
        <strong>Active Filters:</strong>

        @if ($genre !== '' || $rating !== '')
            @if ($genre !== '')
                Genre: {{ $genre }}
            @endif

            @if ($rating !== '')
                | Rating: {{ $rating }}
            @endif
        @else
            None
        @endif
    </div>

    
    <h5>Filter by Genre</h5>

    @foreach (['Adventure', 'Fantasy', 'Classic', 'Romance', 'Drama'] as $item)
        <a href="{{ route('books.index', [
            'genre' => $item,
            'rating' => $rating
        ]) }}"
           class="btn btn-outline-primary btn-sm mb-2">
            {{ $item }}
        </a>
    @endforeach

    <hr>

    
    <h5>Filter by Rating</h5>

    @foreach ([5.0, 6.7, 8.7, 8.8, 9.6, 9.9] as $item)
        <a href="{{ route('books.index', [
            'genre' => $genre,
            'rating' => $item
        ]) }}"
           class="btn btn-outline-success btn-sm mb-2">
            {{ $item }}
        </a>
    @endforeach

    <hr>

    
    <a href="{{ route('books.index') }}"
       class="btn btn-secondary btn-sm mb-3">
        Clear All Filters
    </a>

    <table class="table table-striped table-bordered">

        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['genre'] }}</td>
                    <td>{{ $book['rating'] }}</td>

                    <td>
                        <a href="{{ route('books.show', $book['id']) }}"
                           class="btn btn-primary btn-sm">
                            VIEW DETAILS
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        NO BOOKS MATCH THE SELECTED FILTER.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

@endsection