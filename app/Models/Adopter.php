<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    use HasFactory;
     protected $fillable = [
        'id',
        'adpt_name',
        'adpt_lnam',
        'adpt_addr',
        'adpt_phone',


    ];

    public function animal(){
        return $this->belongsToMany(Animal::class)->withTimestamps();
    }
}
