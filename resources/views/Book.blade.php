<!DOCTYPE html>
<html>
<head>
    <title>Daftar Genre Buku</title>
</head>
<body>
    <h1>Halloo</h1>
    <p>Ini adalah kumpulan Genre buku</p>

    @foreach ($Books as $item)
        <ul>
            <li>{{ $item->name }}</li>
            <li>{{ $item->buku }}</li>
        </ul>
    @endforeach
</body>
</html>
