<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Entry</title>
</head>
<body>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="store" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="section">Section:</label>
        <input type="text"  name="section" required>
        <br>
        <label for="cgpa">Chap:</label>
        <input type="text"  name="cgpa" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
