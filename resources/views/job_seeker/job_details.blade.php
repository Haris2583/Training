<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <link rel="stylesheet" href="{{ asset('css/job_detail.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .job-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .job-title {
            font-size: 26px;
            font-weight: bold;
            margin: 0;
            color: #333;
        }
        .job-company {
            font-size: 18px;
            color: #777;
        }
        .job-details {
            border-top: 1px solid #ddd;
            padding-top: 20px;
            margin-top: 20px;
        }
        .job-section {
            margin-bottom: 20px;
        }
        .job-section h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #444;
        }
        .job-section p {
            margin: 0;
            line-height: 1.6;
            color: #666;
        }
        .apply-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: block;
            width: 90%;
            text-decoration: none;
            margin-top: 20px;
        }
        .apply-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="job-header">
            <h1 class="job-title">{{ $job->title }}</h1>
            <div class="job-company">{{ $job->employer->name }}</div>
        </div>
        <div class="job-details">
            <div class="job-section">
                <h3>Job Description</h3>
                <p>{{ $job->job_description }}</p>
            </div>
            <div class="job-section">
                <h3>Requirements</h3>
                <p>{{ $job->requirements }}</p>
            </div>
            <div class="job-section">
                <h3>Experience</h3>
                <p>{{ $job->experience }} years</p>
            </div>
            <div class="job-section">
                <h3>Timing</h3>
                <p>{{ $job->timing }}</p>
            </div>
            <div class="job-section">
                <h3>Education</h3>
                <p>{{ $job->education }}</p>
            </div>
            <a href="{{ route('job.apply', $job->id) }}" class="apply-btn">Apply Now</a>
        </div>
    </div>
</body>
</html>
