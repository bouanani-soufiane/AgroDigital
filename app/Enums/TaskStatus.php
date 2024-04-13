<?php

namespace App\Enums;

enum TaskStatus : string
{
    case PENDING = 'Pending';
    case DONE = 'done';
    case CANCELLED = 'Cancelled';

}
