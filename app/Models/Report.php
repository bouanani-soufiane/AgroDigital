<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'content',
        'disease_id',
        'task_id',
    ];
    protected $with = ['products'];
    public function task(){
        return $this->belongsTo(Task::class);
    }
    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
