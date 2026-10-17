<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
 public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'pages' => 'required|integer|min:1',
            'is_available' => 'required|boolean',
            'author' => 'nullable|string|max:255',
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function index(Request $request)
    {
        $genre = $request->query('genre', '');
        $rating = $request->query('rating', '');

        $books = Book::all();

        return view('books.index', compact(
            'books',
            'genre',
            'rating'
        ));
    }

    public function featured()
    {
        $books = Book::where('is_available', true)
            ->latest()
            ->take(3)
            ->get();

        return view('books.featured', compact('books'));
    }
}
