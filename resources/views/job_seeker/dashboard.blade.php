<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/job_seeker.css') }}">
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1>Job Seeker Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="#">Search Jobs</a></li>
                    <li><a href="#">My Applications</a></li>
                    <li><a href="#">Profile</a></li>
                    <li> <form method="POST" action="{{ route('job_seeker.logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button></li>
                </ul>
            </nav>
        </header>
        <main class="dashboard-content">
            <section>
                <h2>Find Your Dream Job</h2>
                <p>Welcome, Job Seeker! Start searching for jobs and apply today.</p>
            </section>
        </main>
        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
