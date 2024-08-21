<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CreateSlug;
use Illuminate\Support\Facades\Log;


class Practice extends Model
{
    use CreateSlug;
    protected $guarded=[];

    public function setSlugAttribute($name)
    {
        $this->attributes['slug'] = $this->generateSlug($name);
        Log::info('Generated slug: ' . $this->attributes['slug']);
    }
    public function getSlugAttribute()
    {
        return $this->attributes['slug'];
    }
}
