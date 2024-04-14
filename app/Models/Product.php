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
        'stock',
        'type',
        'employee_id',
    ];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function reports(){
        return $this->belongsToMany(Report::class);
    }

}
