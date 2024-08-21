<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <h2>
            <td>ID</td>
        <td><h2>Title</h2></td>
        <td><h2>Description</h2></td>
        <td><h2>Price</h2></td>
        </tr>
@foreach($products as $key=>$product)
    
       <tr>
       <td> {{$key+1}} </td>
        <td><h2>{{ $product->title }}</h2></td>
        <td>  <p>{{ $product->description }}</p></td>
        <td><p>{{ $product->price }}</p></td>
        <td> <a href="{{ route('products.show', $product->id) }}">View Details</a></td>
        </tr>
        
@endforeach

</table>
</body>
</html>
