<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
        <tr>
        <td><h2>Size</h2></td>
        <td><h2>Color</h2></td>
        </tr>

@foreach($product->variants as $variant)
    <tr>
       <td><p>Size: {{ $variant->size }}</p></td> 
       <td>  <img src="{{ $variant->picture }}" alt="Product Image"></td> 
       </tr>
    
@endforeach
</table>

</body>
</html>