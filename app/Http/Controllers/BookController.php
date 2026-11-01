<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        $authors = Author::all();

        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'pages' => 'required|integer|min:1',
            'is_available' => 'required|boolean',
            'author_id' => 'required|exists:authors,id',
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    public function show(string $id)
    {
        $book = Book::with('author')->findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function index(Request $request)
    {
        $author = $request->query('author', '');

        $query = Book::with('author');

        if ($author !== '') {
            $query->where('author_id', $author);
        }

        $books = $query->get();
        $authors = Author::all();

        return view('books.index', compact(
            'books',
            'authors',
            'author'
        ));
    }

    public function featured()
    {
        $books = Book::with('author')
            ->where('is_available', true)
            ->latest()
            ->take(3)
            ->get();

        return view('books.featured', compact('books'));
    }
}
