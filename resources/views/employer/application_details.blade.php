<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Details</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        .details-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .details-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .details-container p {
            margin-bottom: 10px;
        }
        .btn {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="dashboard-header">
        <h1>Employer Dashboard</h1>
            <nav>
                <ul>
                <li><a href="{{ route('employer.dashboard') }}">Dashboard</a></li>

                    <li><a href="{{ route('employer.jobs.create') }}">Post Jobs</a></li>
                    <li><a href="#">Search Candidates</a></li>
                    <li>
                        <form method="POST" action="{{ route('employer.logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <h1>Application Details</h1>
            <div class="details-container">
                <h1>Application for Job: {{ $application->job->title }}</h1>
                <p><strong>Name:</strong> {{ $application->name }}</p>
                <p><strong>Email:</strong> {{ $application->email }}</p>
                <p><strong>Address:</strong> {{ $application->address }}</p>
                <p><strong>Country:</strong> {{ $application->country }}</p>
                <p><strong>City:</strong> {{ $application->city }}</p>
                <p><strong>Experience:</strong> {{ $application->experience }}</p>
                <p><strong>Current Job:</strong> {{ $application->current_job }}</p>
                <p><strong>Expected Salary:</strong> {{ $application->expected_salary }}</p>
                <p><strong>Current Salary:</strong> {{ $application->current_salary }}</p>
                <p><strong>CV:</strong> <a href="{{ Storage::url($application->cv_path) }}" class="btn btn-primary" download>Download CV</a></p>
            </div>
        </main>

        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
