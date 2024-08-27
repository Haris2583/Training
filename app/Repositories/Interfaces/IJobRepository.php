<?php
namespace App\Repositories\Interfaces;

use App\Models\PostJob;
use App\Enums\JobStatus;
use Illuminate\Support\Collection;
interface IJobRepository
{
    public function createJob(array $data): PostJob;
    public function updateJobStatus(PostJob $job, JobStatus $status): bool;
    public function getPendingJobs(): Collection;
    public function getApprovedJobs(): Collection;
    public function getRejectedJobs(): Collection;
    public function getJobsByEmployer(int $employerId): Collection;
    public function deleteJob(PostJob $job): bool;


}
