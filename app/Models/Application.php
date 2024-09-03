<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ApplicationStatus;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'name',
        'email',
        'address',
        'country',
        'city',
        'experience',
        'current_job',
        'expected_salary',
        'current_salary',
        'cv_path',
        'status',
    ];

    protected $casts = [
        'status' => ApplicationStatus::class,
    ];
    public function job()
    {
        return $this->belongsTo(PostJob::class, 'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::observe(\App\Observers\ApplicationObserver::class);
    }
}
