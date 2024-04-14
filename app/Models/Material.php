<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'type',
        'manufacturer',
        'purchase_date',
        'employee_id',
    ];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
