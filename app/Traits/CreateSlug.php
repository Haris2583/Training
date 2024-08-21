<?php

namespace App\Traits;

trait CreateSlug
{
    public function generateSlug($title)
    {
        return \Str::slug($title); // Use Laravel's Str::slug method for slug generation
    }
}