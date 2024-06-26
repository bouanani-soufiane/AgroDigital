<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'dateStart',
        'dateEnd',
        'product_id',
        'employee_id',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
