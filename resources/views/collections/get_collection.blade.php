<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    <h1>{{$title}}</h1>
    <p><a href="/category/{{$collection->category->slug}}">Category: {{$collection->category->name}}</a></p>
    <h2>{{$collection->title}}</h2>
</body>
</html>