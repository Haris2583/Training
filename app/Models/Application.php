<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function job()
    {
        return $this->belongsTo(PostJob::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
