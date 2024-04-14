<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'type'
    ];
    public function report()
    {
        return $this->hasMany(Report::class);
    }
}
