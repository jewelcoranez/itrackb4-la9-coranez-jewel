<!DOCTYPE html>
<html>
<head>
    <title>Featured Books</title>
</head>
<body>

    <h1>Featured Books</h1>

    @foreach ($books as $book)
        <div>
            <h2>{{ $book['title'] }}</h2>
            <p>Genre: {{ $book['genre'] }}</p>
            <p>Rating: {{ $book['rating'] }}</p>
        </div>

        <hr>
    @endforeach

</body>
</html>