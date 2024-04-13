<?php

namespace App\Enums;

enum TaskType : string
{
    case TRAITEMENT = 'Traitement';
    case SURVIANCE = 'Surviance';
    case IRRIGATION = 'Irrigation';
    case FERTIGATION = 'Fertigation';

}
