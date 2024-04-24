<?php

namespace App\Enums;

enum ProductType: string
{
    case HERBICIDE = 'Herbicide';
    case INSECTICIDE = 'Insecticide';
    case FUNGICIDE = 'Fungicide';
    case NEMATICIDE = 'Nematicide';
    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
