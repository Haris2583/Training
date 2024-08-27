<?php
namespace App\Repositories;

use App\Repositories\Interfaces\IJobRepository;
use App\Models\PostJob;
use App\Enums\JobStatus;
use Illuminate\Database\Eloquent\Collection;

class JobRepository implements IJobRepository
{
    public function createJob(array $data): PostJob
    {
        $postJob = PostJob::create([
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

        return $postJob;
    }

    public function updateJobStatus(PostJob $job, JobStatus $status): bool
    {
        $job->status = $status;
        return $job->save();
    }

    public function getPendingJobs(): Collection
    {
        return PostJob::where('status', JobStatus::Pending->value)->get();
    }

    public function getApprovedJobs(): Collection
    {
        return PostJob::approved()->get();
    }

    public function getRejectedJobs(): Collection
    {
        return PostJob::rejected()->get();
    }

    public function getJobsByEmployer(int $employerId): Collection
    {
        return PostJob::where('employer_id', $employerId)->get();
    }

    public function deleteJob(PostJob $job): bool
    {
        return $job->delete();
    }
}
