<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job</title>
    <link rel="stylesheet" href="{{ asset('css/job.css') }}">
</head>
<body>
    <div class="job-post-container">
        <h1>Post a New Job</h1>
        <form action="{{ route('employer.jobs.store') }}" method="POST" >
            @csrf

            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="requirements">Requirements</label>
                <textarea id="requirements" name="requirements" required></textarea>
            </div>

            <div class="form-group">
                <label for="job_description">Job Description</label>
                <textarea id="job_description" name="job_description" required></textarea>
            </div>

            <div class="form-group">
                <label for="experience">Experience</label>
                <input type="text" id="experience" name="experience" required>
            </div>

            <div class="form-group">
                <label for="timing">Timing</label>
                <input type="text" id="timing" name="timing" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" required>
            </div>

            <div class="form-group">
                <label for="education">Education</label>
                <input type="text" id="education" name="education" required>
            </div>

            <button type="submit" class="btn">Post Job</button>
           

        </form>
    </div>
</body>
</html>
