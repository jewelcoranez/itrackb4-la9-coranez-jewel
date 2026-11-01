
@extends('layouts.app')

@section('title', 'Books')

@section('content')

<div class="container mt-4">

    <h2 class="mt-4">BOOK LIST</h2>

    <a href="{{ route('books.create') }}"
       class="btn btn-primary mb-3">
        Add Book
    </a>

    <div class="alert alert-info">
        <strong>Active Filter:</strong>

        @if ($author !== '')
            Author ID: {{ $author }}
        @else
            None
        @endif
    </div>

    <h5>Author</h5>

    @foreach ($authors as $item)
        <a href="{{ route('books.index', ['author' => $item->id]) }}"
           class="btn btn-outline-primary btn-sm mb-2">
            {{ $item->name }}
        </a>
    @endforeach

    <hr>

    <a href="{{ route('books.index') }}"
       class="btn btn-secondary btn-sm mb-3">
        Clear Filter
    </a>

    <table class="table table-striped table-bordered">

        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Pages</th>
                <th>Availability</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name ?? 'No Author' }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>
                        {{ $book->is_available ? 'Available' : 'Not Available' }}
                    </td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}"
                           class="btn btn-primary btn-sm">
                            VIEW DETAILS
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">NO BOOKS FOUND.</td>
                </tr>
            @endforelse

        </tbody>

    </table>

</div>

@endsection
