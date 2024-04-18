<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_name',
        'cultur_id'
    ];
    protected $with = ['stage'];
    public function stage()
    {
        return $this->belongsToMany(Stage::class, 'attributes')
        ->withPivot('id','attribute_name', 'attribute_value')
        ->orderBy('attributes.id');
    }
    public function cultur()
    {
        return $this->belongsTo(Cultur::class);
    }

}
