<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .dashboard-header h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #007bff;
        }

        .dashboard-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.manage_users') }}">Manage Users</a></li>
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <h2>Edit User</h2>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.update_user', $user->id) }}">
                @csrf
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ $user->name }}" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div>
                    <label for="role">Role:</label>
                    <select name="role">
                        <option value="job_seeker" {{ $user->role == 'job_seeker' ? 'selected' : '' }}>Job Seeker</option>
                        <option value="employer" {{ $user->role == 'employer' ? 'selected' : '' }}>Employer</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </main>

        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
