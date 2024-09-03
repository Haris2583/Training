<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker Profile</title>
    <link rel="stylesheet" href="{{ asset('css/job_seeker.css') }}">
</head>
<body>
    <div class="profile-container">
        <header class="dashboard-header">
            <h1>Job Seeker Profile</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('job_seeker.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('job_seeker.profile') }}">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('job_seeker.logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="profile-content">
            <h2>Profile Details</h2>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            <h3>Update Password</h3>
            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('job_seeker.update_password') }}">
                @csrf
                <div>
                    <label for="current_password">Current Password:</label>
                    <input type="password" name="current_password" required>
                </div>
                <div>
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" required>
                </div>
                <div>
                    <label for="new_password_confirmation">Confirm New Password:</label>
                    <input type="password" name="new_password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </main>

        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
