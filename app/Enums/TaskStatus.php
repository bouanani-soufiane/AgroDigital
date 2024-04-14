<?php

namespace App\Enums;

enum TaskStatus : string
{
    case PENDING = 'Pending';
    case DONE = 'Done';
    case CANCELLED = 'Cancelled';

}
