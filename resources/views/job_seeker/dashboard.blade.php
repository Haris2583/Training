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
        @if(session('alert'))
            <div class="alert">
                <script>
                    alert("{{ session('alert') }}");
                </script>
            </div>
        @endif

        <header class="dashboard-header">
        <h1>Job Seeker Dashboard</h1>
            <nav>
                <ul>
                <li><a href="{{ route('job_seeker.applications') }}">My Applications</a></li>
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
        <main class="dashboard-content">
            <section>
                <h2>Find Your Dream Job</h2>
                <input type="text" placeholder="Search jobs..." id="jobSearch" />
                <div class="job-list">
                    @foreach($jobs as $job)
                        <div class="job-card">
                            <h3>{{ $job->title }}</h3>
                            <p><strong>Timing:</strong> {{ $job->timing }}</p>
                            <p><strong>Experience:</strong> {{ $job->experience }}</p>
                            <a href="{{ route('job.show', $job->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('jobSearch');
            const jobCards = document.querySelectorAll('.job-card');
            searchInput.addEventListener('keyup', function () {
                const query = searchInput.value.toLowerCase();
                jobCards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    const timing = card.querySelector('p').textContent.toLowerCase();
                    const experience = card.querySelector('p').textContent.toLowerCase();
                    if (title.includes(query) || timing.includes(query) || experience.includes(query)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>