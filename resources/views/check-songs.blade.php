<!-- resources/views/check-songs.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Songs</title>
</head>
<body>
    <h1>Check Songs</h1>
    <ul>
        @foreach ($songs as $song)
            <li>{{ $song->title }} - {{ $song->song_genre }} - {{ $song->song_length }}</li>
        @endforeach
    </ul>
</body>
</html>
