<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Create authors first
        $fitzgerald = Author::create([
            'name' => 'F. Scott Fitzgerald',
        ]);

        $harper = Author::create([
            'name' => 'Harper Lee',
        ]);

        $tolkien = Author::create([
            'name' => 'J.R.R. Tolkien',
        ]);

        $austen = Author::create([
            'name' => 'Jane Austen',
        ]);

        $orwell = Author::create([
            'name' => 'George Orwell',
        ]);

        // Create books and connect them to authors
        Book::create([
            'title' => 'The Great Gatsby',
            'pages' => 180,
            'is_available' => true,
            'author_id' => $fitzgerald->id,
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'pages' => 281,
            'is_available' => true,
            'author_id' => $harper->id,
        ]);

        Book::create([
            'title' => 'The Hobbit',
            'pages' => 310,
            'is_available' => false,
            'author_id' => $tolkien->id,
        ]);

        Book::create([
            'title' => 'Pride and Prejudice',
            'pages' => 432,
            'is_available' => true,
            'author_id' => $austen->id,
        ]);

        Book::create([
            'title' => '1984',
            'pages' => 328,
            'is_available' => false,
            'author_id' => $orwell->id,
        ]);
    }
}
