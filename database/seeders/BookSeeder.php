<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'The Great Gatsby',
                'pages' => 180,
                'is_available' => true,
                'author' => 'F. Scott Fitzgerald',
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'pages' => 281,
                'is_available' => true,
                'author' => 'Harper Lee',
            ],
            [
                'title' => 'The Hobbit',
                'pages' => 310,
                'is_available' => false,
                'author' => 'J.R.R. Tolkien',
            ],
            [
                'title' => 'Pride and Prejudice',
                'pages' => 432,
                'is_available' => true,
                'author' => 'Jane Austen',
            ],
            [
                'title' => '1984',
                'pages' => 328,
                'is_available' => false,
                'author' => 'George Orwell',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}