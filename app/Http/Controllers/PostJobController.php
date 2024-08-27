<?php
namespace App\Http\Controllers;

use App\Repositories\Interfaces\IJobRepository;
use App\Repositories\JobRepository;
use App\Models\PostJob;
use App\Enums\JobStatus;
use Illuminate\Http\Request;
use Log;
class PostJobController extends Controller
{
    protected $jobRepository;

    public function __construct(IJobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }
   
    
    public function updateJobStatus(Request $request, PostJob $job)
    {
        $status = JobStatus::from($request->input('status'));
        $this->jobRepository->updateJobStatus($job, $status);

        return redirect()->route('admin.jobs.index');
    }

    public function index()
    {
        $pendingJobs = $this->jobRepository->getPendingJobs();
        $approvedJobs = $this->jobRepository->getApprovedJobs();
        $rejectedJobs = $this->jobRepository->getRejectedJobs();
        return view('admin.manage_jobs', compact('pendingJobs', 'approvedJobs', 'rejectedJobs'));
    }

    public function approve(Request $request, PostJob $job)
    {
        $this->jobRepository->updateJobStatus($job, JobStatus::Approved);
        return redirect()->route('admin.jobs.index')->with('success', 'Job approved successfully.');
    }

    public function reject(Request $request, PostJob $job)
    {
        $this->jobRepository->updateJobStatus($job, JobStatus::Rejected);
        return redirect()->route('admin.jobs.index')->with('success', 'Job rejected successfully.');
    }
}
