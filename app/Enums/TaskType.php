<?php

namespace App\Enums;

enum TaskType : string
{
    case TRAITEMENT = 'Traitement';
    case SURVIANCE = 'Surviance';
    case IRRIGATION = 'Irrigation';
    case FERTIGATION = 'Fertigation';
    case NONE = '0';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
