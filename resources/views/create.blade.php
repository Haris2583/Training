<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <h2>Create Product</h2>

    <form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" required>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" required></textarea>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="number" name="price" required>
    </div>
    <button type="submit">Create</button>
</form>
</body>
</html>
