<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link rel="stylesheet" href="{{ asset('css/job_application_form.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-header h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }
        .form-group textarea {
            height: 100px;
            resize: vertical;
        }
        .submit-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            font-size: 16px;
            text-decoration: none;
            margin-top: 20px;
        }
        .submit-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Apply for {{ $job->title }}</h1>
        </div>
        <form action="{{ route('job.apply', ['job' => $job->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="experience">Experience (in years)</label>
                <input type="number" id="experience" name="experience" required>
            </div>
            <div class="form-group">
                <label for="currentJob">Current Job</label>
                <input type="text" id="currentJob" name="current_job">
            </div>
            <div class="form-group">
                <label for="expectedSalary">Expected Salary</label>
                <input type="text" id="expectedSalary" name="expected_salary">
            </div>
            <div class="form-group">
                <label for="currentSalary">Current Salary</label>
                <input type="text" id="currentSalary" name="current_salary">
            </div>
            <div class="form-group">
                <label for="cv">Upload CV</label>
                <input type="file" id="cv" name="cv" required>
            </div>
            <button type="submit" class="submit-btn">Submit Application</button>
        </form>
    </div>
</body>
</html>
