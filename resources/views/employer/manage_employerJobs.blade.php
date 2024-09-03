<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Jobs</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> <!-- Adjust the CSS path as needed -->
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
        .alert-success {
            color: green;
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
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
        .logout-button {
            background-color: #343a40;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
    @if(session('alert'))
            <div class="alert">
                <script>
                    alert("{{ session('alert') }}");
                </script>
            </div>
        @endif
        <header class="dashboard-header">
            <h1>Employer Dashboard</h1>
            <nav>
                <ul>
                <li><a href="{{ route('employer.dashboard') }}">Dashboard</a></li>

                    <li><a href="{{ route('employer.jobs.create') }}">Post Jobs</a></li>
                    <li><a href="{{ route('employer.candidates.search') }}">Search Candidates</a></li>

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
            <h1>Manage Your Jobs</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->status }}</td> <!-- Display status directly -->
                            <td>
                                
                                    <a href="{{ route('employer.jobs.edit', $job->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('employer.jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('employer.jobs.applications', $job->id) }}" class="btn btn-info">View Applications</a>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No jobs found.</td>
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
