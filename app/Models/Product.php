<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'type',
        'employee_id',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function image()
    {
        return $this->morphOne(Image::class, "imageable");
    }

    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }
}
