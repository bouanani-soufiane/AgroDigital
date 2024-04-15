<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultur extends Model
{
    use HasFactory;
    protected $fillable = [
        'cultur_name',
    ];
    public function program(){
        return $this->hasOne(Program::class);
    }
}
