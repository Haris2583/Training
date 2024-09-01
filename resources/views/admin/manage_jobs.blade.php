<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Jobs</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        /* Basic table styling for clarity */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .dashboard-header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            margin-bottom: 20px;
        }
        .dashboard-header h1 {
            margin: 0;
        }
        .dashboard-header nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 15px;
        }
        .dashboard-header nav ul li {
            display: inline;
        }
        .dashboard-header nav ul li a,
        .logout-button {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #6c757d;
            border-radius: 5px;
            display: inline-block;
        }
        .dashboard-header nav ul li a:hover,
        .logout-button:hover {
            background-color: #5a6268;
        }
        .dashboard-content section {
            margin-bottom: 40px;
        }
        .dashboard-footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            background-color: #f8f9fa;
        }
    </style>
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
                        </form>

                    </li>
                </ul>
            </nav>
        </header>
        <main class="dashboard-content">
            <section>
                <h2>Pending Jobs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Employer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingJobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->employer->name }}</td>
                                <td>
                                <form action="{{ route('jobs.approve', ['job' => $job->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>

                                        <form action="{{ route('jobs.reject', ['job' => $job->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            <section>
                <h2>Approved Jobs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Employer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($approvedJobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->employer->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            <section>
                <h2>Rejected Jobs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Employer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rejectedJobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->employer->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
