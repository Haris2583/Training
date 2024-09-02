<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IJobRepository;
use App\Models\PostJob;
use App\Models\Application;
use App\Enums\JobStatus;
use Illuminate\Database\Eloquent\Collection;

class JobRepository implements IJobRepository
{
    // Job-related methods
    public function createJob(array $data): PostJob
    {
        return PostJob::create([
            'employer_id' => auth()->id(),
            'title' => $data['title'],
            'requirements' => $data['requirements'],
            'job_description' => $data['job_description'],
            'experience' => $data['experience'],
            'timing' => $data['timing'],
            'location' => $data['location'],
            'education' => $data['education'],
            'status' => JobStatus::Pending->value,
        ]);
    }

    public function updateJobStatus(PostJob $job, JobStatus $status): bool
    {
        $job->status = $status->value;
        return $job->save();
    }

    public function getPendingJobs(): Collection
    {
        return PostJob::where('status', JobStatus::Pending->value)->get();
    }

    public function getApprovedJobs(): Collection
    {
        return PostJob::where('status', JobStatus::Approved->value)->get();
    }

    public function getRejectedJobs(): Collection
    {
        return PostJob::where('status', JobStatus::Rejected->value)->get();
    }

    public function getJobsByEmployer(int $employerId): Collection
    {
        return PostJob::where('employer_id', $employerId)->get();
    }

    public function deleteJob(PostJob $job): bool
    {
        return $job->delete();
    }

    // Application-related methods
    public function createApplication(array $data): Application
    {
        return Application::create([
            'job_id' => $data['job_id'],
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'country' => $data['country'],
            'city' => $data['city'],
            'experience' => $data['experience'],
            'current_job' => $data['current_job'],
            'expected_salary' => $data['expected_salary'],
            'current_salary' => $data['current_salary'],
            'cv_path' => $data['cv_path'],
        ]);
    }

    public function getApplicationsByJob(int $jobId): Collection
    {
        return Application::where('job_id', $jobId)->get();
    }

    public function getApplicationsByUser(int $userId): Collection
    {
        return Application::where('user_id', $userId)->get();
    }
}
