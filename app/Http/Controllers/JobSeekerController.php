<?php

namespace App\Http\Controllers;

use App\Events\ApplicationCreated;
use Illuminate\Http\Request;
use App\Models\PostJob;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\IJobRepository;
use App\Enums\ApplicationStatus;
use Illuminate\Support\Facades\Hash;

class JobSeekerController extends Controller
{
    protected $jobRepository;

    // Inject the job repository into the controller
    public function __construct(IJobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function index(Request $request)
    {
        $query = $request->input('search');

        $jobs = $this->jobRepository->getApprovedJobs()
            ->filter(function ($job) use ($query) {
                return !$query || str_contains(strtolower($job->title), strtolower($query)) ||
                       str_contains(strtolower($job->timing), strtolower($query)) ||
                       str_contains(strtolower($job->experience), strtolower($query));
            });

        return view('job_seeker.dashboard', compact('jobs'));
    }

    public function show(PostJob $job)
    {
        return view('job_seeker.job_details', compact('job'));
    }

    public function apply(PostJob $job)
    {
        return view('job_seeker.job_application', compact('job'));
    }

    public function store(Request $request, PostJob $job)
    {
        if ($request->hasFile('cv')) {
            \Log::info('File uploaded: ' . $request->file('cv')->getClientOriginalName());
        } else {
            \Log::info('No file uploaded');
        }
    
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
    
        $cvPath = $request->file('cv')->store('cvs', 'public');
    
        $application = Application::create([
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
            'status'=> ApplicationStatus::NotViewed->value,
        ]);
    
        ApplicationCreated::dispatch($application);
    
        return redirect()->route('job_seeker.dashboard')->with('alert', 'Application submitted successfully!');
    }
        public function myApplications()
    {
        $applications = Application::where('user_id', Auth::id())->with('job')->get();
        return view('job_seeker.my_applications', compact('applications'));
    }

    public function profile()
{
    $user = auth()->user(); 
    return view('job_seeker.profile', compact('user'));
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed', 
    ]);

    if (!Hash::check($request->current_password, auth()->user()->password)) {
        return back()->withErrors(['current_password' => 'Current password does not match our records.']);
    }

    auth()->user()->update(['password' => Hash::make($request->new_password)]);

    return redirect()->route('job_seeker.profile')->with('success', 'Password updated successfully.');
}

    
    
}
