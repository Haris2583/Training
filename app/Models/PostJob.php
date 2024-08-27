<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\JobStatus;

class PostJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'requirements',
        'job_description', // Updated to match migration
        'experience',
        'timing',
        'location',
        'education',
        'status',
        'employer_id'
    ];

    protected $casts = [
        'status' => JobStatus::class, // Cast the status attribute to the JobStatus enum
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    // Optionally, you can have a scope to filter jobs by status
    public function scopeApproved($query)
    {
        return $query->where('status', JobStatus::Approved->value);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', JobStatus::Rejected->value);
    }
}
