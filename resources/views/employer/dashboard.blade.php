<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/employeer.css') }}">
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1>Employer Dashboard</h1>
            <nav>
                <ul>
                <li><a href="{{ route('employer.jobs.create') }}">Post Jobs</a></li>
                <li><a href="{{ route('employer.jobs.index') }}">Manage Jobs</a></li>

                    <li><a href="#">Search Candidates</a></li>
                    <li>
                    <form method="POST" action="{{ route('employer.logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                    </li>
                </ul>
            </nav>
        </header>
        <main class="dashboard-content">
            <section>
                <h2>Manage Your Listings</h2>
                <p>Welcome, Employer! Post new jobs and manage your listings.</p>
            </section>
        </main>
        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
