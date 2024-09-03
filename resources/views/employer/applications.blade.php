<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Applications</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        /* Basic CSS for table styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }
        .btn-info {
            background-color: #17a2b8;
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
                <li><a href="{{ route('employer.jobs.create') }}">Post Jobs</a></li>
                <li><a href="{{ route('employer.jobs.index') }}">Manage Jobs</a></li>
                <li><a href="{{ route('employer.candidates.search') }}">Search Candidates</a></li>


                    <li>
                    <form method="POST" action="{{ route('employer.logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
        <h1>Applications for Job: {{ $job->title }}</h1>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $application)
                        <tr>
                            <td>{{ $application->name }}</td>
                            <td>{{ $application->email }}</td>
                            <td>{{ $application->status }}</td>
                            <td>
                                <a href="{{ route('employer.applications.details', $application->id) }}" class="btn btn-info">View Details</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No applications found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </main>

        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
