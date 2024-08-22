<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <a href="{{route('products.create')}}"><button>Go Back</button></a> 
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
        <td>
            <form action="{{ route('products.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                @csrf
                @method('DELETE')
                <button type="submit">Delete product</button>
            </form>
        </td>
        </tr>
        
@endforeach

</table>
</body>
</html>
