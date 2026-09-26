@extends('layouts.app')

@section('title', $book['title'])

@section('content')

    <h2>{{ $book['title'] }}</h2>

    <p>ID: {{ $book['id'] }}</p>
    <p>Title: {{ $book['title'] }}</p>
    
    <p>Genre: {{ $book['genre'] }}</p>
    

    <a href="{{ route('books.index') }}">Back</a>

@endsection