<?php

namespace App\Enums;

enum ApplicationStatus: string
{
    case NotViewed= 'not_viewed';
    case Viewed = 'viewed';
}
