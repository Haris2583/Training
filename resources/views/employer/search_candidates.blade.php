<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Details</title>
    <link rel="stylesheet" href="{{ asset('css/job.css') }}">
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
        <h1>Search Candidates</h1>
        <div class="job-post-container">

        <form action="{{ route('employer.candidates.results') }}" method="GET" class="mb-4">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" name="country" class="form-control" placeholder="Skills (e.g., Pakistan, US)">
            </div>
            <div class="form-group">
                <input type="text" name="city" class="form-control" placeholder="Location">
            </div>
            <div class="form-group">
                <select name="experience" class="form-control">
                    <option value="">Select Experience Level</option>
                    <option value="1">1 year</option>
                    <option value="2">2 year</option>
                    <option value="3">3 year</option>
                    <option value="4">4 year</option>
                    <option value="5">5 year</option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        </div>
        </main>

        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
