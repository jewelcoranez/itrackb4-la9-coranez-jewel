<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $books = $this->books();

        $book = collect($books)->firstWhere('id', (int) $id);

        if (!$book) {
            abort(404);
        }

        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function index(Request $request)
{
    $genre = $request->query('genre', '');
    $rating = $request->query('rating', '');

    $books = collect($this->books())
        ->when($genre !== '', function ($books) use ($genre) {
            return $books->where('genre', $genre);
        })
        ->when($rating !== '', function ($books) use ($rating) {
            return $books->where('rating', (float) $rating);
        })
        ->values();

    return view('books.index', compact(
        'books',
        'genre',
        'rating'
    ));
}

    private function books()
    {
        return [
            [
                'id' => 1,
                'title' => 'The Alchemist',
                'genre' => 'Adventure',
                'rating' => 5.0,
            ],
            [
                'id' => 2,
                'title' => 'Harry Potter',
                'genre' => 'Fantasy',
                'rating' => 9.9,
            ],
            [
                'id' => 3,
                'title' => 'The Hobbit',
                'genre' => 'Fantasy',
                'rating' => 8.7,
            ],
            [
                'id' => 4,
                'title' => 'The Little Prince',
                'genre' => 'Classic',
                'rating' => 9.6,
            ],
            [
                'id' => 5,
                'title' => 'Pride and Prejudice',
                'genre' => 'Romance',
                'rating' => 8.8,
            ],
            [
                'id' => 6,
                'title' => 'To Kill a Mockingbird',
                'genre' => 'Drama',
                'rating' => 6.7,
            ],
        ];
    }
}