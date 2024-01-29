<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
</head>
<body>
    title: {{  $car->title }}
    <br>
    content: {{  $car->content }}
    <br>
    price:  {{  $car->price }}
    <br>
    passenger:  {{  $car->passenger }}
    <br>
    luggage:  {{  $car->luggage }}
    <br>
    doors:  {{  $car->doors }}
    <br>
    Category: {{  $car->category->categoryName }}
    
</body>
</html>