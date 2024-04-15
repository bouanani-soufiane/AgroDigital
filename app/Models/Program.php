<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_name',
    ];
    public function stage()
    {
        return $this->belongsToMany(Stage::class, 'attributes');
    }
    public function cultur()
    {
        return $this->belongsTo(Cultur::class);
    }
}
