<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genre</title>
</head>
<body>
    <h1>Halloo</h1>
    <p>Ini adalah kumpulan Genre buku</p>
  
@foreach ($genres as $genre)
    <ul>
        <li>{{ $genre ['name']  }}</li>
        <li>{{ $genre ['description'] }}</li>
    </ul>
@endforeach



</body>
</html>