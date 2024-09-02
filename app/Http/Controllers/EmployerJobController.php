<?php
namespace App\Http\Controllers;

use App\Repositories\Interfaces\IJobRepository;
use App\Models\PostJob;
use App\Enums\JobStatus;
use Illuminate\Http\Request;
use App\Models\Application;
use Log;

class EmployerJobController extends Controller
{
    protected $jobRepository;

    public function __construct(IJobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }
       

    public function index()
    {
        $jobs = $this->jobRepository->getJobsByEmployer(auth()->id());

        foreach ($jobs as $job) {
            // Ensure that the status is a string value
            $job->status = JobStatus::from($job->status->value)->value;
        }

        return view('employer.manage_employerJobs', ['jobs' => $jobs]);
    }

    public function updateStatus(Request $request, PostJob $job)
    {
        $status = (string) $request->input('status');

        $jobStatus = JobStatus::from($status);

        $this->jobRepository->updateJobStatus($job, $jobStatus);

        return redirect()->route('employer.jobs.index')->with('success', 'Job status updated successfully.');
    }

    
    public function store(Request $request)
    {

        Log::info('Store method called with data: ', $request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'requirements' => 'required|string',
            'job_description' => 'required|string',
            'experience' => 'required|string|max:255',
            'timing' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'education' => 'required|string|max:255',
        ]);

         $this->jobRepository->createJob($request->all());
        return redirect()->route('employer.dashboard');
    }
    
    public function create()
    {
        return view('employer.post_job');
    }
    public function edit(PostJob $job)
    {
        if ($job->employer_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('employer.edit_job', compact('job'));
    }

    public function update(Request $request, PostJob $job)
    {
        if ($job->employer_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'requirements' => 'required|string',
            'job_description' => 'required|string',
            'experience' => 'required|string|max:255',
            'timing' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'education' => 'required|string|max:255',
        ]);

        $job->status='pending';

        $job->update($request->all());
        return redirect()->route('employer.jobs.index')->with('alert', 'Job updated successfully.');
    }

    public function destroy(PostJob $job)
    {
        if ($job->employer_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $job->delete();
        return redirect()->route('employer.jobs.index')->with('alert', 'Job deleted successfully.');
    }
    public function showApplications(PostJob $job)
    {
        $applications = $job->applications; 
        return view('employer.applications', compact('applications', 'job'));
    }
    
    public function showApplicationDetails(Application $application)
    {
       
        $application->status = 'viewed'; 
        $application->save();
    
        return view('employer.application_details', compact('application'));
    }
}
