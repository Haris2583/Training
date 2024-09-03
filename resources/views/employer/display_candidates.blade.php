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
        /* Added table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
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
            <h2>Candidate Search Results</h2>

            @if($candidates->isEmpty())
                <p>No candidates found matching your criteria.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Experience</th>
                            <th>Expected Salary</th>
                            <th>Current Job</th>
                            <th>Address</th>
                            <th>Current Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($candidates as $candidate)
                            <tr>
                                <td>{{ $candidate->name }}</td>
                                <td>{{ $candidate->email }}</td>
                                <td>{{ $candidate->country }}</td>
                                <td>{{ $candidate->city }}</td>
                                <td>{{ $candidate->experience }}</td>
                                <td>{{ $candidate->expected_salary }}</td>
                                <td>{{ $candidate->current_job }}</td>
                                <td>{{ $candidate->address }}</td>
                                <td>{{ $candidate->current_salary }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </main>

        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
