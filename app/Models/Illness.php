<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
    protected $fillable = [
        'id',
        'illness_status',
        'description',


    ];
    use HasFactory;
     public function animal(){
        return $this->belongsToMany(Animal::class)->withTimestamps();
    }
}
