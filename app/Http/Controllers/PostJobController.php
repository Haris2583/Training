<?php
namespace App\Http\Controllers;

use App\Repositories\Interfaces\IJobRepository;
use App\Repositories\JobRepository;
use App\Models\PostJob;
use App\Enums\JobStatus;
use Illuminate\Http\Request;
use App\Models\User;


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

    public function manageUsers()
{
    $users = User::all(); // Fetch all users
    return view('admin.manage_users', compact('users'));
}

public function editUser($id)
{
    $user = User::findOrFail($id); // Fetch user by ID
    return view('admin.edit_user', compact('user'));
}

public function updateUser(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        // Additional validation rules
    ]);

    $user = User::findOrFail($id);
    $user->update($request->only(['name', 'email', 'role'])); // Update the user details

    return redirect()->route('admin.manage_users')->with('success', 'User updated successfully.');
}

public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete(); // Delete the user

    return redirect()->route('admin.manage_users')->with('success', 'User deleted successfully.');
}

}
