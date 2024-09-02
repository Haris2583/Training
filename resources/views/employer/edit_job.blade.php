<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> <!-- Adjust the CSS path as needed -->
    <style>
        /* Basic CSS for form styling */
        form {
            max-width: 600px;
            margin: auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            color: white;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="dashboard-header">
            <h1>Edit Job</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('employer.jobs.index') }}">Back to Jobs</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <form action="{{ route('employer.jobs.update', $job->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $job->title) }}" required>
                </div>
                <div class="form-group">
                    <label for="requirements">Requirements</label>
                    <textarea id="requirements" name="requirements" rows="4" required>{{ old('requirements', $job->requirements) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="job_description">Job Description</label>
                    <textarea id="job_description" name="job_description" rows="4" required>{{ old('job_description', $job->job_description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="experience">Experience</label>
                    <input type="text" id="experience" name="experience" value="{{ old('experience', $job->experience) }}" required>
                </div>
                <div class="form-group">
                    <label for="timing">Timing</label>
                    <input type="text" id="timing" name="timing" value="{{ old('timing', $job->timing) }}" required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location', $job->location) }}" required>
                </div>
                <div class="form-group">
                    <label for="education">Education</label>
                    <input type="text" id="education" name="education" value="{{ old('education', $job->education) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Job</button>
                <a href="{{ route('employer.jobs.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </main>

        <footer class="dashboard-footer">
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
