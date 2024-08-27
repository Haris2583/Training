<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="#">Manage Users</a></li>
                    <li><a href="{{ route('admin.jobs.index') }}">Manage Jobs</a></li>

                    <li><a href="#">Settings</a></li>
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                    </li>
                </ul>
            </nav>
        </header>
        <main class="dashboard-content">
            <section>
                <h2>Overview</h2>
                <p>Welcome, Admin! Here you can manage users, jobs, and more.</p>
            </section>
        </main>
        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
