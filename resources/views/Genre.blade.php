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
    <p>Ini adalah kupulan Genre buku</p>
  
@foreach ($Genres as $item)
    <ul>
        <li>{{ $item }}</li>
    </ul>    
@endforeach



</body>
</html>