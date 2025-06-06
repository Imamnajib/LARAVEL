<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Heloo</h1>
    <p>ini adalah author nya </p>

@foreach ($Authors as $author)
    <ul>
        <li>{{ $author['name']}}</li>
         <li>{{ $author['komik']}}</li>

    </ul>    
@endforeach


</body>
</html>