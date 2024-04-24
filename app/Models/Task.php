<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'Description',
        'DateStart',
        'DateEnd',
        'Status',
        'TypeTask',
        'employee_id',
    ];
    protected $with = ['employee']; 
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function report()
    {
        return $this->hasMany(Report::class);
    }
}
