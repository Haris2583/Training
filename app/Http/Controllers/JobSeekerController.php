<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostJob;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $jobs = PostJob::where('status', 'approved')
            ->where(function ($queryBuilder) use ($query) {
                if ($query) {
                    $queryBuilder->where('title', 'like', "%{$query}%")
                        ->orWhere('timing', 'like', "%{$query}%")
                        ->orWhere('experience', 'like', "%{$query}%");
                }
            })
            ->get();

        return view('job_seeker.dashboard', compact('jobs'));
    }


    public function show(PostJob $job)
    {
        return view('job_seeker.job_details', compact('job'));
    }

    public function apply(PostJob $job)
    {
        return view('job_seeker.apply', compact('job'));
    }

    // Store the application
    public function store(Request $request, PostJob $job)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'current_job' => 'required|string|max:255',
            'expected_salary' => 'nullable|numeric',
            'current_salary' => 'nullable|numeric',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Handle the file upload
        $cvPath = $request->file('cv')->store('cvs', 'public');

        // Create the application
        Application::create([
            'job_id' => $job->id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'experience' => $request->experience,
            'current_job' => $request->current_job,
            'expected_salary' => $request->expected_salary,
            'current_salary' => $request->current_salary,
            'cv_path' => $cvPath,
        ]);

        return redirect()->route('job_seeker.index')->with('success', 'Application submitted successfully!');
    }
}
