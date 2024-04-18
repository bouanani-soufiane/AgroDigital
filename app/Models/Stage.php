<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $fillable = [
        'stage_name',
    ];
    public function program()
    {
        return $this->belongsToMany(Program::class, 'attributes')->withPivot('attribute_name', 'attribute_value');
    }
}
