<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends User
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function materials(){
        return $this->hasMany(Material::class);
    }
   
}
